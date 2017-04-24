<?php

namespace MFRNA\TelegramBot\Types\InlineQueryResult;

use MFRNA\TelegramBot\Types\InlineQueryResult;
use MFRNA\TelegramBot\Types\InlineKeyboardMarkup;
use MFRNA\TelegramBot\Types\InputMessageContent;

/**
 * Class InlineQueryResultVideo
 * @package MFRNA\TelegramBot\Types\InlineQueryResult
 * @property string type
 * @property string id
 * @property string video_url
 * @property string mime_type
 * @property string|null thumb_url
 * @property string|null title
 * @property string|null caption
 * @property int|null video_width
 * @property int|null video_height
 * @property int|null video_duration
 * @property string|null description
 * @property InlineKeyboardMarkup|null reply_markup
 * @property InputMessageContent|null input_message_content
 */
class InlineQueryResultVideo extends InlineQueryResult
{
    protected $validProps = ['type', 'id', 'video_url', 'mime_type', 'thumb_url', 'title', 'caption', 'video_width',
        'video_height', 'video_duration', 'description', 'reply_markup', 'input_message_content'];

    protected $objectTypes = [
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class
    ];
}