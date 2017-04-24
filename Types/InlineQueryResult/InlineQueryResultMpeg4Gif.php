<?php

namespace MFRNA\TelegramBot\Types\InlineQueryResult;

use MFRNA\TelegramBot\Types\InlineQueryResult;
use MFRNA\TelegramBot\Types\InlineKeyboardMarkup;
use MFRNA\TelegramBot\Types\InputMessageContent;

/**
 * Class InlineQueryResultMpeg4Gif
 * @package MFRNA\TelegramBot\Types\InlineQueryResult
 * @property string type
 * @property string id
 * @property string mpeg4_url
 * @property int|null mpeg4_width
 * @property int|null mpeg4_height
 * @property string|null thumb_url
 * @property string|null title
 * @property string|null caption
 * @property InlineKeyboardMarkup|null reply_markup
 * @property InputMessageContent|null input_message_content
 */
class InlineQueryResultMpeg4Gif extends InlineQueryResult
{
    protected $validProps = ['type', 'id', 'mpeg4_url', 'mpeg4_width', 'mpeg4_height', 'thumb_url', 'title', 'caption',
        'reply_markup', 'input_message_content'];

    protected $objectTypes = [
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class
    ];
}