<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

/**
 * Home controller for CodeIgniter 4 application.
 *
 * This controller handles the homepage (`/`) and 404 (Not Found) responses.
 */
class Home extends BaseController
{
    public function index(): string
    {
        $database = \Config\Database::connect();
        if ($database) {
            // check if db exists:
            if ($database->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME='yourDbName'")) {
                //db connection initialized
                return view('welcome_message');
            } else {
                return false; // db not exist
            }
        } else {
            //db connection  not initialized
            return redirect()->to('db_setup');
        }
    }

    /**
     * Renders a custom 404 (Not Found) error message.
     *
     * This method returns a response object with a custom error message
     * and a 404 Not Found status code.
     *
     * @return ResponseInterface A response object with the error message and 404 status code.
     */
    public function show404()
    {
        return $this->getResponse(
            [
                'message' => 'Sorry! Cannot seem to find the url you were looking for.'
            ],
            ResponseInterface::HTTP_NOT_FOUND
        );
    }

}
