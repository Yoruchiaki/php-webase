<?php

namespace Yoruchiaki\Webase\Helpers;

use Exception;

class Signature
{
    public static function md5Encrypt($timestamp, $appKey, $appSecret): string
    {
        try {
            $dataStr = $timestamp.$appKey.$appSecret;
            $s = md5($dataStr);
            return strtoupper($s);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return "";
    }

}