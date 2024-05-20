<?php

use App\Models\UserModel;
use Config\Services;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

/**
 * @param $authenticationHeader
 * @return string
 * @throws Exception
 */
function getJWTFromRequest($authenticationHeader): string
{
    if (is_null($authenticationHeader)) { //JWT is absent
        throw new Exception('Missing or invalid JWT in request');
    }
    //JWT is sent from client in the format Bearer XXXXXXXXX
    return explode(' ', $authenticationHeader)[1];
}

/**
 * @param string $encodedToken
 * @throws Exception
 */
function validateJWTFromRequest(string $encodedToken)
{
    $pubKey = Services::getPublicKey();
    $decodedToken = JWT::decode($encodedToken, new Key($pubKey, 'RS256'));
    $userModel = new UserModel();
    $userModel->findUserByEmailAddress($decodedToken->data->email);
}

/**
 * @param string $email
 * @return string
 */
function getSignedJWTForUser(string $email): string
{
    $issuedAtTime = time();
    $tokenTimeToLive = getenv('JWT_TIME_TO_LIVE');
    $tokenExpiration = $issuedAtTime + $tokenTimeToLive;    // expire time in seconds
    $notBeforeClaim = $issuedAtTime + 10;                   // not before in seconds
    $pvtKey = Services::getPrivateKey();                    // get RSA private key (NOT IN USE)
    $baseURL = config('App')->baseURL;
    $payload = [
        "iss" => $baseURL, //"http://test.local", // this can be the servername. Example: https://domain.com
        "aud" => $baseURL, //"http://test.local",
        "sub" => "Subject of the JWT",
        "nbf" => $notBeforeClaim,
        'iat' => $issuedAtTime,
        'exp' => $tokenExpiration,
        "data" => array(
            'email' => $email,
        )
    ];

    return JWT::encode($payload,$pvtKey, 'RS256');
}