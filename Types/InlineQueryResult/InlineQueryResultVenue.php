<?php

namespace MFRNA\TelegramBot\Types\InlineQueryResult;

use MFRNA\TelegramBot\Types\InlineQueryResult;
use MFRNA\TelegramBot\Types\InlineKeyboardMarkup;
use MFRNA\TelegramBot\Types\InputMessageContent;

/**
 * Class InlineQueryResultVenue
 * @package MFRNA\TelegramBot\Types\InlineQueryResult
 * @property string type
 * @property string id
 * @property float latitude
 * @property float longitude
 * @property string title
 * @property string address
 * @property string|null foursquare_id
 * @property InlineKeyboardMarkup|null reply_markup
 * @property InputMessageContent|null input_message_content
 * @property string|null thumb_url
 * @property int|null thumb_width
 * @property int|null thumb_height
 */
class InlineQueryResultVenue extends InlineQueryResult
{
    protected $validProps = ['type', 'id', 'latitude', 'longitude', 'title', 'address', 'foursquare_id', 'reply_markup',
        'input_message_content', 'thumb_url', 'thumb_width', 'thumb_height'];

    protected $objectTypes = [
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class
    ];
}