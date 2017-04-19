<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class UserProfilePhotos
 * @package MFRNA\TelegramBot\Types
 * @property int total_count
 * @property PhotoSize[][] photos (array of array of PhotoSize's)
 */
class UserProfilePhotos extends Type
{
    protected $readOnly = array('total_count','photos');
    protected $validProps = array('total_count','photos');


    protected $objectTypes = [
        'photos' => [[PhotoSize::class]]
    ];

//    public function __construct($response)
//    {
//        var_dump($response);
//        $this->props = $response['result'];
//    }
}