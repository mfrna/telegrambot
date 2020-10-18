<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class Contact
 * @package MFRNA\TelegramBot\Types
 * @property string type
 */
class KeyboardButtonPollType extends Type
{
    protected $validProps = ['type'];
    protected $readOnly = ['type'];
}
