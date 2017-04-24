<?php

namespace MFRNA\TelegramBot\Types\InlineQueryResult;

use MFRNA\TelegramBot\Types\InlineQueryResult;
use MFRNA\TelegramBot\Types\InlineKeyboardMarkup;
use MFRNA\TelegramBot\Types\InputMessageContent;

/**
 * Class InlineQueryResultCachedPhoto
 * @package MFRNA\TelegramBot\Types\InlineQueryResult
 * @property string type
 * @property string id
 * @property string photo_file_id
 * @property string|null title
 * @property string|null description
 * @property string|null caption
 * @property InlineKeyboardMarkup|null reply_markup
 * @property InputMessageContent|null input_message_content
 */
class InlineQueryResultCachedPhoto extends InlineQueryResult
{
    protected $validProps = ['type', 'id', 'photo_file_id', 'title', 'description', 'caption', 'reply_markup',
        'input_message_content'];

    protected $objectTypes = [
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class
    ];
}