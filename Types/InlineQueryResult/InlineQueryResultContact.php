<?php

namespace MFRNA\TelegramBot\Types\InlineQueryResult;

use MFRNA\TelegramBot\Types\InlineQueryResult;
use MFRNA\TelegramBot\Types\InlineKeyboardMarkup;
use MFRNA\TelegramBot\Types\InputMessageContent;

/**
 * Class InlineQueryResultContact
 * @package MFRNA\TelegramBot\Types\InlineQueryResult
 * @property string type
 * @property string id
 * @property string phone_number
 * @property string first_name
 * @property string|null last_name
 * @property InlineKeyboardMarkup|null reply_markup
 * @property InputMessageContent|null input_message_content
 * @property string|null thumb_url
 * @property int|null thumb_width
 * @property int|null thumb_height
 */
class InlineQueryResultContact extends InlineQueryResult
{
    protected $validProps = ['type', 'id', 'phone_number', 'first_name', 'last_name', 'reply_markup',
        'input_message_content', 'thumb_url', 'thumb_width', 'thumb_height'];

    protected $objectTypes = [
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class
    ];
}