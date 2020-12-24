<?php

namespace App\Traits;

trait Responser
{
    protected function successResponse($data, $message = 'Success', $code = 200)
    {
        return response()->json([
            'status'=> 1,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function errorResponse($code, $message = 'Failed')
    {
        return response()->json([
            'status'=> 2,
            'message' => $message,
        ], $code);
    }
}
