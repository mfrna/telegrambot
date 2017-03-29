<?php

namespace MFRNA\TelegramBot\Types;

class InlineKeyboardButton
{
    protected $readOnly = array();
    protected $validProps = array(
        'text',
        'url',
        'callback_data',
        'switch_inline_query',
        'switch_inline_query_current_chat',
        'callback_game'
    );
}