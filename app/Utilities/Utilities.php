<?php

use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;


if (!function_exists('errorResponse')) {
    /**
     * Error response
     *
     * @param array $data
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    function errorResponse(
        array  $data = [],
        string $message = "Action was not successful",
        int    $statusCode = 400,
    ): JsonResponse
    {
        $response = [
            'status' => false,
            'message' => $message,
            'data' => $data
        ];
        return response()->json($response, $statusCode);
    }
}

if (!function_exists('successResponse')) {
    /**
     * Success response
     *
     * @param array $data
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */

    function successResponse(
        array  $data = [],
        string $message = "Action was successful",
        int    $statusCode = 200,
    ): JsonResponse
    {
        $response = [
            'status' => true,
            'message' => $message,
            'data' => $data
        ];
        return response()->json($response, $statusCode);
    }
}
