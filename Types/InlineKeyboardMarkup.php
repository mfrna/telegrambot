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
}