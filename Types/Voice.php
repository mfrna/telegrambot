<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class Voice
 * @package MFRNA\TelegramBot\Types
 * @property string file_id
 * @property int duration
 * @property string|null mime_type
 * @property int|null file_size
 */
class Voice extends Type
{
    protected $validProps = ['file_id','duration','mime_type','file_size'];
    protected $readOnly = ['file_id','duration','mime_type','file_size'];
}