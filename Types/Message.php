<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class Message
 * @package MFRNA\TelegramBot\Types
 * @property int message_id
 * @property User from
 * @property int date
 * @property Chat chat
 * @property User forward_from
 * @property Chat forward_from_chat
 * @property int forward_from_message_id
 * @property int forward_date
 * @property Message reply_to_message
 * @property int edit_date
 * @property string text
 * @property MessageEntity[] entities
 * @property Audio audio
 * @property Document document
 * @property Game game
 * @property PhotoSize[] photo
 * @property Sticker sticker
 * @property Video video
 * @property Voice voice
 * @property string caption
 * @property Contact contact
 * @property Location location
 * @property Venue venue
 * @property User new_chat_member
 * @property User left_chat_member
 * @property string new_chat_title
 * @property PhotoSize[] new_chat_photo
 * @property bool delete_chat_photo
 * @property bool group_chat_created
 * @property bool supergroup_chat_created
 * @property bool channel_chat_created
 * @property int migrate_to_chat_id
 * @property int migrate_from_chat_id
 * @property Message pinned_message
 * @Todo: autoload/init objects for attached entities
 */
class Message extends Type 
{
    protected $validProps = ['message_id','from','date','chat','forward_from','forward_from_chat',
        'forward_from_message_id','forward_date','reply_to_message','edit_date','text','entities','audio',
        'document','game','photo','sticker','video','voice','caption','contact','location','venue','new_chat_member',
        'left_chat_member','new_chat_title','new_chat_photo','delete_chat_photo','group_chat_created',
        'supergroup_chat_created','channel_chat_created','migrate_to_chat_id','migrate_from_chat_id','pinned_message'
    ];
    protected  $readOnly = ['message_id','from','date','chat','forward_from','forward_from_chat',
        'forward_from_message_id','forward_date','reply_to_message','edit_date','text','entities','audio',
        'document','game','photo','sticker','video','voice','caption','contact','location','venue','new_chat_member',
        'left_chat_member','new_chat_title','new_chat_photo','delete_chat_photo','group_chat_created',
        'supergroup_chat_created','channel_chat_created','migrate_to_chat_id','migrate_from_chat_id','pinned_message'
    ];
}