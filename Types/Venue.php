<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class Venue
 * @package MFRNA\TelegramBot\Types
 * @property Location location
 * @property string title
 * @property string address
 * @property string|null foursquare_id
 */
class Venue extends Type
{
    protected $validProps = ['location','title','address','foursquare_id'];
    protected $readOnly = ['location','title','address','foursquare_id'];

    protected $objectTypes = [
        'location' => Location::class
    ];
}