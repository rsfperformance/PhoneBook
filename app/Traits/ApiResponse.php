<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponse
{
    public function successResponse(string $message = '', $data = null)
    {
        return new JsonResponse([
            'status' => true,
            'message' => $message,
            'data' => $data
        ], Response::HTTP_OK);
    }

    public function errorResponse(string $message = '', int $httpCode = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        return new JsonResponse([
            'status' => false,
            'message' => $message
        ], $httpCode);
    }
}
