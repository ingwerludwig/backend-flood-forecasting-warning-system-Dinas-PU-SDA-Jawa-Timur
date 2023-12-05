<?php

namespace App\Exceptions;

use App\Http\Response\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class CustomExceptionHandler extends ExceptionHandler
{

    public function __construct()
    {
        parent::__construct(app());
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof HttpException) {
            $statusCode = $exception->getStatusCode();
            $message = $exception->getMessage();
        }
        else {
            $statusCode = $this->getStatusCodeFromThrowable($exception);
            $message = 'Error: ' . $exception->getMessage() . ' caused by: ' . $exception->getTraceAsString();
        }
        $data = null;
        return response()->json(Response::error($message, $statusCode, $data), $statusCode);

        return parent::render($request, $exception);
    }

    protected function getStatusCodeFromThrowable(Throwable $exception): int
    {
        $statusCode = $exception->getCode();
        if ($statusCode < 100 || $statusCode > 599) {
            $statusCode = 500;
        }

        return $statusCode;
    }
}
