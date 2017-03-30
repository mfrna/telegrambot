<?php
/**
 * Created by PhpStorm.
 * User: mfarag
 * Date: 30/03/17
 * Time: 04:20 م
 */

namespace MFRNA\TelegramBot\Types;


/**
 * Class PhotoSize
 * @package MFRNA\TelegramBot\Types
 * @property string file_id
 * @property int width
 * @property int height
 * @property int|null file_size
 */
class PhotoSize extends Type
{
    protected $validProps = ['file_id','width','height','file_size'];
    protected $readOnly = ['file_id','width','height','file_size'];
}