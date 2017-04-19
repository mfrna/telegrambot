<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class InputVenueMessageContent
 * @package MFRNA\TelegramBot\Types
 * @property float latitude
 * @property float longitude
 * @property string title
 * @property string address
 * @property string foursquare_id
 */
class InputVenueMessageContent extends InputMessageContent
{
    protected $validProps = ['latitude', 'longitude', 'title', 'address', 'foursquare_id'];
}