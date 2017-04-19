<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class InputTextMessageContent
 * @package MFRNA\TelegramBot\Types
 * @property string message_text
 * @property string|null parse_mode
 * @property bool|null disable_web_page_preview
 */
class InputTextMessageContent extends InputMessageContent
{
    protected $validProps = ['message_text', 'parse_mode', 'disable_web_page_preview'];
}