<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class InlineQueryResultPhoto
 * @package MFRNA\TelegramBot\Types
 * @property string type
 * @property string id
 * @property string photo_url
 * @property string thumb_url
 * @property int|null photo_width
 * @property int|null photo_height
 * @property string|null title
 * @property string|null description
 * @property string|null caption
 * @property InlineKeyboardMarkup|null reply_markup
 * @property InputMessageContent|null input_message_content
 */
class InlineQueryResultPhoto extends InlineQueryResult
{
    protected $validProps = ['type', 'id', 'photo_url', 'thumb_url', 'photo_width', 'photo_height', 'title',
        'description', 'caption', 'reply_markup', 'input_message_content'];

    protected $objectTypes = [
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class
    ];
}