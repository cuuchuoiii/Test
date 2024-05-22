<?php
namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait APIResponseTrait
{
    /**
     * Success Response.
     * @param mixed $data
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public function successResponse(mixed $data, string $message = "Successful", int $status = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
            'errors' => null
        ], $status);
    }

    /**
     * Error Response
     * @param mixed $errors
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public function errorResponse(mixed $errors = null, string $message = "Somethings went wrong", int $status = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => null,
            'errors' => $errors
        ], $status);
    }
}
