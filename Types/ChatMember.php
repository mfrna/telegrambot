<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class ChatMember
 * @package MFRNA\TelegramBot\Types
 * @property User user
 * @property string status
 */
class ChatMember extends Type{
    protected $validProps = ['user', 'status'];
    protected $readOnly = ['user', 'status'];

    protected $objectTypes = [
        'user' => User::class
    ];
}