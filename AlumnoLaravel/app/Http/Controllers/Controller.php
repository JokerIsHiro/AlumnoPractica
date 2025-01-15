<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function sendResponse($success, $message, $data, $status)
    {
        return response()->json([
            "Success" => $success,
            "Message" => $message,
            "Data" => $data
            
        ], $status);
    }
}
