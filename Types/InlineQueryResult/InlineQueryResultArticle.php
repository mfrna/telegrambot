<?php

namespace MFRNA\TelegramBot\Types\InlineQueryResult;

use MFRNA\TelegramBot\Types\InlineQueryResult;
use MFRNA\TelegramBot\Types\InlineKeyboardMarkup;
use MFRNA\TelegramBot\Types\InputMessageContent;

/**
 * Class InlineQueryResultArticle
 * @package MFRNA\TelegramBot\Types\InlineQueryResult
 * @property string type
 * @property string id
 * @property string title
 * @property InputMessageContent input_message_content
 * @property InlineKeyboardMarkup|null reply_markup
 * @property string|null url
 * @property bool|null hide_url
 * @property string|null description
 * @property string|null thumb_url
 * @property int|null thumb_width
 * @property int|null thumb_height
 */
class InlineQueryResultArticle extends InlineQueryResult
{
    protected $validProps = ['type', 'id', 'title', 'input_message_content', 'reply_markup', 'url', 'hide_url',
        'description', 'thumb_url', 'thumb_width', 'thumb_height'];

    protected $objectTypes = [
        'input_message_content' => InputMessageContent::class,
        'reply_markup' => InlineKeyboardMarkup::class
    ];
}