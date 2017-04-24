<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class Update
 * @package MFRNA\TelegramBot\Types
 * @property int update_id
 * @property Message|null message
 * @property Message|null edited_message
 * @property Message|null channel_post
 * @property Message|null edited_channel_post
 * @property InlineQuery|null inline_query
 * @property ChosenInlineResult|null chosen_inline_result
 * @property CallbackQuery|null callback_query
 */
class Update extends Type
{
    protected $validProps = ['update_id', 'message', 'edited_message', 'channel_post', 'edited_channel_post',
        'inline_query', 'chosen_inline_result', 'callback_query'];
    protected $readOnly = ['update_id', 'message', 'edited_message', 'channel_post', 'edited_channel_post',
        'inline_query', 'chosen_inline_result', 'callback_query'];

    protected $objectTypes = [
        'message' => Message::class,
        'edited_message' => Message::class,
        'channel_post' => Message::class,
        'edited_channel_post' => Message::class,
        'inline_query' => InlineQuery::class,
        'chosen_inline_result' => ChosenInlineResult::class,
        'callback_query' => CallbackQuery::class
    ];
}