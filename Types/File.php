<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class File
 * This object represents a file ready to be downloaded.
 * The file can be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>.
 * It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested
 * by calling getFile.
 *
 * @package MFRNA\TelegramBot\Types
 * @property string file_id
 * @property int|null file_size
 * @property string|null file_path Use https://api.telegram.org/file/bot<token>/<file_path> to get the file
 */
class File extends Type
{
    protected $readOnly = array('file_id','file_size','file_path');
    protected $validProps = array('file_id','file_size','file_path');
}