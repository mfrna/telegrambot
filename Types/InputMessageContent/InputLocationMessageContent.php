<?php

namespace MFRNA\TelegramBot\Types\InputMessageContent;

use MFRNA\TelegramBot\Types\InputMessageContent;

/**
 * Class InputLocationMessageContent
 * @package MFRNA\TelegramBot\Types
 * @property float latitude
 * @property float longitude
 */
class InputLocationMessageContent extends InputMessageContent
{
    protected $validProps = ['latitude', 'longitude'];
}