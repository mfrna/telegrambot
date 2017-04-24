<?php

namespace MFRNA\TelegramBot\Types\InlineQueryResult;

use MFRNA\TelegramBot\Types\InlineQueryResult;
use MFRNA\TelegramBot\Types\InlineKeyboardMarkup;
use MFRNA\TelegramBot\Types\InputMessageContent;

/**
 * Class InlineQueryResultDocument
 * @package MFRNA\TelegramBot\Types\InlineQueryResult
 * @property string type
 * @property string id
 * @property string title
 * @property string|null caption
 * @property string document_url
 * @property string mime_type
 * @property string|null description
 * @property InlineKeyboardMarkup|null reply_markup
 * @property InputMessageContent|null input_message_content
 * @property string|null thumb_url
 * @property int|null thumb_width
 * @property int|null thumb_height
 */
class InlineQueryResultDocument extends InlineQueryResult
{
    protected $validProps = ['type', 'id', 'title', 'caption', 'document_url', 'mime_type', 'description',
        'reply_markup', 'input_message_content', 'thumb_url', 'thumb_width', 'thumb_height'];

    protected $objectTypes = [
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class
    ];
}