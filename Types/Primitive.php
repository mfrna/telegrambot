<?php

namespace MFRNA\TelegramBot\Types;

class Primitive extends Type
{
    public static function bool(array $apiCallResult)
    {
        return (bool) $apiCallResult['result'];
    }

    public static function int(array $apiCallResult)
    {
        return (int) $apiCallResult['result'];
    }

    public static function string(array $apiCallResult)
    {
        return (string) $apiCallResult['result'];
    }
}
