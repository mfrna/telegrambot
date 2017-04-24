<?php

namespace MFRNA\TelegramBot\Types;


/**
 * Class ChosenInlineResult
 * @package MFRNA\TelegramBot\Types
 * @property string result_id
 * @property User from
 * @property Location|null location
 * @property string inline_message_id
 * @property string query
 */
class ChosenInlineResult extends Type
{
    protected $validProps = ['result_id', 'from', 'location', 'inline_message_id', 'query'];
    protected $readOnly = ['result_id', 'from', 'location', 'inline_message_id', 'query'];

    protected $objectTypes = [
        'from' => User::class,
        'location' => Location::class
    ];
}