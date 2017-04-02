<?php

namespace MFRNA\TelegramBot\Types;

class CallbackQuery extends Type
{
    protected $validProps = ['id', 'from', 'message', 'inline_message_id', 'chat_instance', 'data', 'game_short_name'];
    protected $readOnly = ['id', 'from', 'message', 'inline_message_id', 'chat_instance', 'data', 'game_short_name'];
}