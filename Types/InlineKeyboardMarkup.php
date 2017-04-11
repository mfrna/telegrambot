<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class InlineKeyboardMarkup
 *
 *
 * @package MFRNA\TelegramBot\Types
 * @property array(InlineKeyboardButton[]) inline_keyboard
 */
class InlineKeyboardMarkup extends Type{
    protected $validProps = ['inline_keyboard'];

    protected $objectTypes = [
        'inline_keyboard' => [[InlineKeyboardButton::class]]
    ];

    public function __construct(array $inline_keyboard)
    {
        parent::__construct(['result'=>['inline_keyboard'=>$inline_keyboard]]);
    }

    public function addRow(array $keys)
    {
        $this->props['inline_keyboard'][] = $keys;
    }
}