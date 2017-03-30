<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class Audio
 * @package MFRNA\TelegramBot\Types
 * @property string file_id
 * @property int duration
 * @property string|null performer
 * @property string|null title
 * @property string|null mime_type
 * @property int|null file_size
 */
class Audio extends Type
{
    protected $validProps = ['file_id','duration','performer','title','mime_type','file_size'];
    protected $readOnly = ['file_id','duration','performer','title','mime_type','file_size'];
}