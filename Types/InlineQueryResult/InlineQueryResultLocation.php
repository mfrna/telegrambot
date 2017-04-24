<?php

namespace MFRNA\TelegramBot\Types\InlineQueryResult;

use MFRNA\TelegramBot\Types\InlineQueryResult;
use MFRNA\TelegramBot\Types\InlineKeyboardMarkup;
use MFRNA\TelegramBot\Types\InputMessageContent;

/**
 * Class InlineQueryResultLocation
 * @package MFRNA\TelegramBot\Types\InlineQueryResult
 * @property string type
 * @property string id
 * @property float latitude
 * @property float longitude
 * @property string title
 * @property InlineKeyboardMarkup|null reply_markup
 * @property InputMessageContent|null input_message_content
 * @property string|null thumb_url
 * @property int|null thumb_width
 * @property int|null thumb_height
 */
class InlineQueryResultLocation extends InlineQueryResult
{
    protected $validProps = ['type', 'id', 'latitude', 'longitude', 'title', 'reply_markup', 'input_message_content',
        'thumb_url', 'thumb_width', 'thumb_height'];

    protected $objectTypes = [
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class
    ];
}