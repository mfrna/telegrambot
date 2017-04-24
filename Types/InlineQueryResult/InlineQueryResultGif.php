<?php

namespace MFRNA\TelegramBot\Types\InlineQueryResult;

use MFRNA\TelegramBot\Types\InlineQueryResult;
use MFRNA\TelegramBot\Types\InlineKeyboardMarkup;
use MFRNA\TelegramBot\Types\InputMessageContent;

/**
 * Class InlineQueryResultGif
 * @package MFRNA\TelegramBot\Types\InlineQueryResult
 * @property string type
 * @property string id
 * @property string gif_url
 * @property int|null gif_width
 * @property int|null gif_height
 * @property string|null thumb_url
 * @property string|null title
 * @property string|null caption
 * @property InlineKeyboardMarkup|null reply_markup
 * @property InputMessageContent|null input_message_content
 */
class InlineQueryResultGif extends InlineQueryResult
{
    protected $validProps = ['type', 'id', 'gif_url', 'gif_width', 'gif_height', 'thumb_url', 'title', 'caption',
        'reply_markup', 'input_message_content'];

    protected $objectTypes = [
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class
    ];
}