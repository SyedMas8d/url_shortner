<?php

namespace App\Traits;
use Log;

trait Response {

    public function SendResponse($result, $message, $code = 200)
    {
        $response = [
            'status' => $code,
            'message' => $message,
            'data' => $result
        ];

        return response()->json($response, $code);
    }

    public function sendError($error, $exception = null, $code = 404)
    {
        if($exception)
        {
            Log::error($exception);
        }
        
        $response = [
            'success' => false,
            'message' => $error,
        ];

        return response()->json($response, $code);
    }
}