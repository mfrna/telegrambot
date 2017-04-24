<?php

namespace MFRNA\TelegramBot\Types\InlineQueryResult;

use MFRNA\TelegramBot\Types\InlineQueryResult;
use MFRNA\TelegramBot\Types\InlineKeyboardMarkup;

/**
 * Class InlineQueryResultGame
 * @package MFRNA\TelegramBot\Types\InlineQueryResult
 * @property string type
 * @property string id
 * @property string game_short_name
 * @property InlineKeyboardMarkup|null reply_markup
 */
class InlineQueryResultGame extends InlineQueryResult
{
    protected $validProps = ['type', 'id', 'game_short_name', 'reply_markup'];

    protected $objectTypes = [
        'reply_markup' => InlineKeyboardMarkup::class
    ];
}