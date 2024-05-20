<?php

namespace App\Controllers\API;

use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Exception;
use ReflectionException;

/**
 * Class User
 * @package App\Controllers\API
 */
class User extends BaseController
{
    // use ResponseTrait;
    /**
     * Register a new user
     * @return Response|ResponseInterface
     * @throws ReflectionException
     */
    public function register()
    {
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
            'username' => 'required|min_length[6]|max_length[50]|is_unique[users.username]',
            'password' => 'required|min_length[6]|max_length[255]'
        ];

        $errors = [
            'email' => [
                'is_unique' => 'This email address is already registered.',
            ],
            'username' => [
                'is_unique' => 'This username is already taken.'
            ]
        ];

        $input = $this->getRequestInput($this->request);
        if (!$this->validateRequest($input, $rules, $errors)) {
            return $this->getResponse(
                        $this->validator->getErrors(),
                        ResponseInterface::HTTP_BAD_REQUEST
                );
        }

        $userModel = new UserModel();
        $userModel->save($input);

        return $this->getJWTForUser(
                $input['email'],
                ResponseInterface::HTTP_CREATED
            );
    }

    /**
     * Authenticate Existing User
     * @return Response|ResponseInterface
     */
    public function login()
    {
        $rules = [
            'email' => 'required|min_length[6]|max_length[50]|valid_email',
            'password' => 'required|min_length[6]|max_length[255]|validateUser[email, password]'
        ];

        $errors = [
            'password' => [
                'validateUser' => 'Invalid login credentials provided'
            ]
        ];

        $input = $this->getRequestInput($this->request);


        if (!$this->validateRequest($input, $rules, $errors)) {
            return $this->getResponse(
                    $this->validator->getErrors(),
                    ResponseInterface::HTTP_BAD_REQUEST
                );
        }
        return $this->getJWTForUser($input['email']);
    }

    /**
     * @param string $emailAddress
     * @param int $responseCode
     * @return Response
     */
    private function getJWTForUser(string $emailAddress, int $responseCode = ResponseInterface::HTTP_OK)
    {
        try {
            $model = new UserModel();
            $user = $model->findUserByEmailAddress($emailAddress);
            unset($user['password']);

            helper('jwt');

            return $this->getResponse(
                    [
                        'message' => 'User authenticated successfully',
                        'user' => $user,
                        'access_token' => getSignedJWTForUser($emailAddress)
                    ]
                );
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    $responseCode
                );
        }
    }
}
