<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class Location
 * @package MFRNA\TelegramBot\Types
 * @property float longitude
 * @property float latitude
 */
class Location extends Type
{
    protected $validProps = ['longitude','latitude'];
    protected $readOnly = ['longitude','latitude'];
}