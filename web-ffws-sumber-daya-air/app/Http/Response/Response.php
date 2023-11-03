<?php

namespace App\Http\Response;

class Response
{
    public static function success($data, $message = '', $statusCode = 200)
    {
        return [
            'statusCode' => $statusCode,
            'status' => true,
            'message' => $message,
            'data' => $data,
        ];
    }

    public static function error($message, $statusCode = 400, $data = null)
    {
        return [
            'statusCode' => $statusCode,
            'status' => false,
            'message' => $message,
            'data' => $data,
        ];
    }
}
