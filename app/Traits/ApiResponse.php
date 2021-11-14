<?php
namespace  App\Traits;


trait ApiResponse
{
    public function responseSuccess($data, $messages = [], $code = 200)
    {
        return response()->json([
            'data' => $data,
            'success' => true,
            'messages' => $messages
        ], $code);
    }


    public function responseError($messages = [], $code = 500, $data = null)
    {
        return response()->json([
            'data' => $data,
            'success' => false,
            'messages' => $messages
        ], $code);
    }
}
