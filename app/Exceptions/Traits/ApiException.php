<?php

namespace App\Exceptions\Traits;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

trait ApiException {

    /**
     * Handles API Exceptions
     *
     * @param [type] $request
     * @param [type] $e
     * @return void
     */
    protected function getJsonException($request, $e)
    {
        if ($e instanceof ModelNotFoundException) {
            return $this->notFoundException();
        }

        if ($e instanceof HttpException) {
            return $this->httpException($e);
        }

        if ($e instanceof ValidationException) {
            return $this->ValidationException($e);
        }

        return $this->genericException();
    }

    /**
     * Return error 404
     *
     * @return void
     */
    protected function notFoundException()
    {
        return $this->getResponse(
            'Resource Not Found.',
            '01',
            404
        );
    }

    /**
     * Return Http errors
     *
     * @return void
     */
    protected function httpException($e)
    {
        $messages = [
            400 => [
                'code' => '02',
                'message' => 'Bad Request.'
            ],
            401 => [
                'code' => '03',
                'message' => 'Unauthorized.'
            ],
            403 => [
                'code' => '04',
                'message' => 'Forbidden.'
            ],
            404 => [
                'code' => '05',
                'message' => 'Not Found.'
            ],
            405 => [
                'code' => '06',
                'message' => 'Method Not Allowed.'
            ],
        ];

        return $this->getResponse(
            $messages[$e->getStatusCode()]['message'],
            $messages[$e->getStatusCode()]['code'],
            $e->getStatusCode()
        );
    }

    /**
     * Return validation's errors
     *
     * @return void
     */
    protected function ValidationException($e)
    {
        return response()->json($e->errors(), $e->status);
    }

    /**
     * Return error 500
     *
     * @return void
     */
    protected function genericException()
    {
        return $this->getResponse(
            'Internal Server Error.',
            '07',
            500
        );
    }

    /**
     * shows Json response
     *
     * @param [type] $message
     * @param [type] $code
     * @param [type] $status
     * @return void
     */
    protected function getResponse($message, $code, $status)
    {
        return response()->json([
            'errors' => [
                'status' => $status,
                'code' => $code,
                'message' => $message
            ]
        ], $status);
    }
}
