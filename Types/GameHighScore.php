<?php

namespace MFRNA\TelegramBot\Types;

class GameHighScore extends Type
{
    protected $validProps = ['position', 'user', 'score'];
    protected $readOnly = ['position', 'user', 'score'];

    protected $objectTypes = [
        'user' => User::class
    ];
}