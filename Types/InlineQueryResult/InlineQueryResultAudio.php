<?php

namespace MFRNA\TelegramBot\Types\InlineQueryResult;

use MFRNA\TelegramBot\Types\InlineQueryResult;
use MFRNA\TelegramBot\Types\InlineKeyboardMarkup;
use MFRNA\TelegramBot\Types\InputMessageContent;

/**
 * Class InlineQueryResultAudio
 * @package MFRNA\TelegramBot\Types\InlineQueryResult
 * @property string type
 * @property string id
 * @property string audio_url
 * @property string title
 * @property string|null caption
 * @property string|null performer
 * @property int|null audio_duration
 * @property InlineKeyboardMarkup|null reply_markup
 * @property InputMessageContent|null input_message_content
 */
class InlineQueryResultAudio extends InlineQueryResult
{
    protected $validProps = ['type', 'id', 'audio_url', 'title', 'caption', 'performer',
        'audio_duration', 'reply_markup', 'input_message_content'];

    protected $objectTypes = [
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class
    ];
}