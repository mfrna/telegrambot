<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class Video
 * @package MFRNA\TelegramBot\Types
 * @property string file_id
 * @property int width
 * @property int height
 * @property int duration
 * @property PhotoSize|null thumb
 * @property string|null mime_type
 * @property int|null file_size
 */
class Video extends Type
{
    protected $validProps = ['file_id','width','height','duration','thumb','mime_type','file_size'];
    protected $readOnly = ['file_id','width','height','duration','thumb','mime_type','file_size'];
}