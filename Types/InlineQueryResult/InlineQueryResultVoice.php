<?php

namespace MFRNA\TelegramBot\Types\InlineQueryResult;

use MFRNA\TelegramBot\Types\InlineQueryResult;
use MFRNA\TelegramBot\Types\InlineKeyboardMarkup;
use MFRNA\TelegramBot\Types\InputMessageContent;

/**
 * Class InlineQueryResultVoice
 * @package MFRNA\TelegramBot\Types\InlineQueryResult
 * @property string type
 * @property string id
 * @property string voice_url
 * @property string title
 * @property string|null caption
 * @property int|null voice_duration
 * @property InlineKeyboardMarkup|null reply_markup
 * @property InputMessageContent|null input_message_content
 */
class InlineQueryResultVoice extends InlineQueryResult
{
    protected $validProps = ['type', 'id', 'voice_url', 'title', 'caption','voice_duration', 'reply_markup',
        'input_message_content'];

    protected $objectTypes = [
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class
    ];
}