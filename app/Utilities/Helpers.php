<?php

namespace App\Utilities;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;

class Helpers {
    
    /**
     * Error response
     *
     * @param array $data
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public function errorResponse(
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
    
    /**
     * Success response
     *
     * @param array $data
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public function successResponse(
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
    
    /**
     * Generate random numbers
     * 
     * @param int $length
     * @return string
     */
    public static function randomNumbers($length = 6): string
    {
        $str = "";
        $characters = array_merge(
            range('0', '9')
        );
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = random_int(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    /**
     * Generate transaction /
     * Session Id
     * 
     * @return string
     */
    public static function generateReference(): string
    {
        return Carbon::now()->format("ymdHms").self::randomNumbers(8);
    }

    /**
     * Generate API KEY
     * @return string|null 
     */
    public static function _generateAPIKey(): string|null
    {
        $apiKey = hash('sha256', Str::random(30));
        $trimmedApiKey = Str::limit($apiKey, 40, '');
        if(env('APP_ENV') === "local" || env('APP_ENV') === "staging") $final = "sk_test_".$trimmedApiKey;
        else $final = "sk_live_".$trimmedApiKey;
        return $final;
    }

    /**
     * Generate Terminal Id
     * @return string|null 
     */
    public static function _generateTerminalId(): string|null
    {
        $terminalId = sprintf("%s%s%s", date('y'), "CS", mt_rand(10000, 99999));
        $trimmedTerminalId = Str::limit($terminalId, 6, '');
        return $trimmedTerminalId;

    }
}


