<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class CallbackQuery
 * @package MFRNA\TelegramBot\Types
 * @property string id
 * @property User from
 * @property Message|null message
 * @property string|null inline_message_id
 * @property string chat_instance
 * @property string|null data
 * @property string|null game_short_name
 */
class CallbackQuery extends Type
{
    protected $validProps = ['id', 'from', 'message', 'inline_message_id', 'chat_instance', 'data', 'game_short_name'];
    protected $readOnly = ['id', 'from', 'message', 'inline_message_id', 'chat_instance', 'data', 'game_short_name'];

    protected $objectTypes = [
        'from' => User::class,
        'message' => Message::class
    ];
}