<?php

namespace MFRNA\TelegramBot\Types\InputMessageContent;

use MFRNA\TelegramBot\Types\InputMessageContent;

/**
 * Class InputContactMessageContent
 * @package MFRNA\TelegramBot\Types
 * @property string phone_number
 * @property string first_name
 * @property string last_name
 */
class InputContactMessageContent extends InputMessageContent
{
    protected $validProps = ['phone_number', 'first_name', 'last_name'];
}