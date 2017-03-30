<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class Chat
 * @package MFRNA\TelegramBot\Types
 * @property int id
 * @property string type
 * @property string|null title
 * @property string|null username
 * @property string|null first_name
 * @property string|null last_name
 * @property bool|null all_members_are_administrators
 */
class Chat extends Type{
    protected $readOnly = array('id','type','title','username','first_name','last_name','all_members_are_administrators');
    protected $validProps = array('id','type','title','username','first_name','last_name','all_members_are_administrators');
}