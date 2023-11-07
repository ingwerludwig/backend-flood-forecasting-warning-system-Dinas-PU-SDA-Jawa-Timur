<?php

namespace App\Http\Response;

class Response
{
    public static function success($data, $message = '', $statusCode = 200): array
    {
        return [
            'statusCode' => $statusCode,
            'status' => true,
            'message' => $message,
            'data' => $data,
        ];
    }

    public static function error($message, $statusCode = 400, $data = null): array
    {
        return [
            'statusCode' => $statusCode,
            'status' => false,
            'message' => $message,
            'data' => $data,
        ];
    }

    public static function validLoginResponse($userData, $token, $message = 'Login Successfully', $statusCode = 200): array
    {
        return [
            'statusCode' => $statusCode,
            'status' => false,
            'message' => $message,
            'user' => $userData,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ];
    }

    public static function unauthorizedLoginResponse(): array
    {
        return [
            'statusCode' => 401,
            'status' => false,
            'message' => 'Unauthorized: Email or Password is invalid',
            'user' => null,
        ];
    }

    public static function invalidTokenResponse(): array
    {
        return [
            'statusCode' => 403,
            'status' => false,
            'message' => 'Invalid Token',
            'user' => null,
        ];
    }

    public static function successLogoutResponse(): array
    {
        return [
            'statusCode' => 200,
            'status' => true,
            'message' => 'Logout successfully',
            'user' => null,
        ];
    }
}
