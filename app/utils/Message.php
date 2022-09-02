<?php

namespace App\utils;

class Message
{

    public static function success($data, $msg,)
    {
        return [
            "status" => true,
            "msg" => $msg,
            "data" => $data
        ];
    }

    public  static function error($msg)
    {
        return [
            "status" => false,
            "msg" => $msg,
            "data" => null
        ];
    }
}
