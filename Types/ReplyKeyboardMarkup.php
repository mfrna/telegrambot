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

    public function __construct(array $keyboard, $resize_keyboard = false, $one_time_keyboard = false, $selective = false)
    {
        parent::__construct(['result' => [
            'keyboard' => $keyboard,
            'resize_keyboard' => $resize_keyboard,
            'one_time_keyboard' => $one_time_keyboard,
            'selective' => $selective
        ]]);
    }

    public function addRow(array $keys)
    {
        $this->props['keyboard'][] = $keys;
    }
}