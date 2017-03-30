<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class MessageEntity
 *
 * This object represents one special entity in a text message.
 * mention, hashtag, bot_command, url, email, bold, italic, code, pre, text_link, text_mention
 *
 * @package MFRNA\TelegramBot\Types
 * @property string type For example, hashtags, usernames, URLs, etc.
 * @property int offset
 * @property int length
 * @property string|null url
 * @property User|null user
 */
class MessageEntity extends Type
{
    protected $validProps = ['type','offset','length','url','user'];
    protected $readOnly = ['type','offset','length','url','user'];
}