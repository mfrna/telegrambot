<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class ReplyKeyboardMarkup
 * @package MFRNA\TelegramBot\Types
 * @property array keyboard
 * @property bool resize_keyboard
 * @property bool one_time_keyboard
 * @property bool selective
 */
class ReplyKeyboardMarkup extends Type
{
    protected $validProps = ['keyboard','resize_keyboard','one_time_keyboard','selective'];
}