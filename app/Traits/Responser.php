<?php

namespace App\Traits;

trait Responser
{
    protected function successResponse($message = 'Success', $data = null)
    {
        return response()->json([
            'status'=> 1,
            'message' => $message,
            'data' => $data
        ]);
    }

    protected function errorResponse($message = 'Failed', $code = 400)
    {
        return response()->json([
            'status'=> 2,
            'message' => $message,
        ], $code);
    }
}
