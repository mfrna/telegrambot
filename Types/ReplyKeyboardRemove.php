<?php

namespace MFRNA\TelegramBot\Types;


/**
 * Class ReplyKeyboardRemove
 *
 * Upon receiving a message with this object, Telegram clients will remove the current custom keyboard
 * and display the default letter-keyboard
 * @package MFRNA\TelegramBot\Types
 * @property bool remove_keyboard
 * @property bool selective
 */
class ReplyKeyboardRemove extends Type
{
    protected $validProps = ['remove_keyboard','selective'];
}