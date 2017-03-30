<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class Document
 * @package MFRNA\TelegramBot\Types
 * @property string file_id
 * @property PhotoSize|null thumb
 * @property string|null file_name
 * @property string|null mime_type
 * @property int|null file_size
 */
class Document extends Type
{
    protected $validProps = ['file_id','thumb','file_name','mime_type','file_size'];
    protected $readOnly = ['file_id','thumb','file_name','mime_type','file_size'];
}