<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class Sticker
 * @package MFRNA\TelegramBot\Types
 * @property string file_id
 * @property int width
 * @property int height
 * @property PhotoSize|null thumb
 * @property string|null emoji
 * @property int|null file_size
 */
class Sticker extends Type
{
    protected $validProps = ['file_id','width','height','thumb','emoji','file_size'];
    protected $readOnly = ['file_id','width','height','thumb','emoji','file_size'];
}