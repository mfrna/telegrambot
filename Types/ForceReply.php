<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class ForceReply
 *
 * Upon receiving a message with this object, Telegram clients will display a reply interface to the user
 * (act as if the user has selected the bot‘s message and tapped ’Reply')
 * @package MFRNA\TelegramBot\Types
 * @property bool force_reply
 * @property bool selective
 */
class ForceReply extends Type
{
    protected $validProps = ['force_reply','selective'];
}