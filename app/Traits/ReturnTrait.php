<?php


namespace App\Traits;

Trait ReturnTrait
{
    public static function fail($message, array $data=[], $code=200)
    {
        $data = [
            'message' => $message,
            'status' => false,
            'code' => $code,
            'data' => $data,
        ];

        return response()->json($data);
    }

    public static function success($message, array $data=[], $code=200)
    {
        $data = [
            'message' => $message,
            'status' => true,
            'code' => $code,
            'data' => $data,
        ];
        return response()->json($data);
    }

}
