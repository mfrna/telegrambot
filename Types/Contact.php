<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class Contact
 * @package MFRNA\TelegramBot\Types
 * @property string phone_number
 * @property string first_name
 * @property string last_name
 * @property int|null user_id
 */
class Contact extends Type
{
    protected $validProps = ['phone_number','first_name','last_name','user_id'];
    protected $readOnly = ['phone_number','first_name','last_name','user_id'];
}