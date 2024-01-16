<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait HttpResponses{
    protected function success($data, $message = null, $code = 200):JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => 'Request was successful.',
        ], $code);
    }

    protected function error($message = null, $code): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'status' => 'Error has occurred.',
        ], $code);

    }
}
