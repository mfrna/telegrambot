<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class InlineKeyboardButton
 * @package MFRNA\TelegramBot\Types
 * @property string text
 * @property boolean request_contact
 * @property boolean request_location
 * @property KeyboardButtonPollType request_poll
 */
class KeyboardButton extends Type
{
    protected $readOnly = array();
    protected $validProps = array(
        'text',
        'request_contact',
        'request_location',
        'request_poll'
    );

    protected $objectTypes = [
        'request_poll' => CallbackGame::class
    ];

    public function __construct($button)
    {
    	parent::__construct(['result'=>$button]);
    }
}
