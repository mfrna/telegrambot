<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class User
 * @package MFRNA\TelegramBot\Types
 * @property int|string id
 * @property string username
 * @property string first_name
 * @property string last_name
 */
class User extends Type{
    protected $readOnly = array('id','username','first_name','last_name');
    protected $validProps = array('id','username','first_name','last_name');
}