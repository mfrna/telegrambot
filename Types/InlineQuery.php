<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class InlineQuery
 * @package MFRNA\TelegramBot\Types
 * @property string id
 * @property User from
 * @property Location|null location
 * @property string query
 * @property string offset
 */
class InlineQuery extends Type
{
    protected $validProps = ['id', 'from', 'location', 'query', 'offset'];

    protected $objectTypes = [
        'from' => User::class,
        'location' => Location::class
    ];
}