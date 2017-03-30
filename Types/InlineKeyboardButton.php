<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class InlineKeyboardButton
 * @package MFRNA\TelegramBot\Types
 * @property string text
 * @property string url
 * @property string callback_data
 * @property string switch_inline_query
 * @property string switch_inline_query_current_chat
 * @property CallbackGame callback_game
 */
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