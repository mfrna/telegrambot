<?php
namespace MFRNA\TelegramBot\API;

use MFRNA\TelegramBot\Types;

class Bot{

    protected $api_url = 'https://api.telegram.org/bot';
    private $client;

    public function __construct($token, Client $client = Null)
    {
        if(empty($client)){
            $client = new CURLClient();
        }
        $this->client = $client;
        $client->setApiUrl($this->api_url);
        $client->setToken($token);
    }

    /**
     * Use this method to specify a url and receive incoming updates via an outgoing webhook.
     * Whenever there is an update for the bot, Telegram will send an HTTPS POST request to the specified url,
     * containing a JSON-serialized Update. In case of an unsuccessful request, Telegram will give up after a
     * reasonable amount of attempts.
     * @param $url
     * @return bool
     */
    public function setWebHook($url)
    {
        return $this->APICall('setWebHook', array('url' => $url));
    }

    /**
     * Main Gateway for API Communications
     * @param $method
     * @param array $params
     * @return mixed
     */
    protected function APICall($method, array $params = array())
    {
        $response = $this->client->post($method, $params);
        return $response;
    }

    /**
    * A simple method for testing your bot's auth token.
    * Returns basic information about the bot in form of a User object.
    *
    * @return Types\User
    */
    public function getMe()
    {
        return new Types\User($this->APICall('getMe'));
    }

    /**
     * Use this method to send text messages. On success, the sent Message is returned
     *
     * @param $chat_id
     * @param $text
     * @param string|null $parse_mode
     * @param bool|null $disable_web_page_preview
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param Types\InlineKeyboardMarkup|Types\ReplyKeyboardMarkup|Types\ReplyKeyboardRemove|Types\ForceReply|null $reply_markup
     * @return Types\Message
     */
    public function sendMessage($chat_id, $text, $parse_mode = null,
        $disable_web_page_preview = null, $disable_notification = null,
        $reply_to_message_id = null, $reply_markup = null)
    {
        return new Types\Message($this->APICall('sendMessage', array(
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => $parse_mode,
            'disable_web_page_preview' => $disable_web_page_preview,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => (string)$reply_markup
        )));
    }


    /**
     * Forward messages of any kind. On success, the sent Message is returned
     *
     * @param int|string $chat_id
     * @param int|string $from_chat_id
     * @param int $message_id
     * @param bool $disable_notification
     * @return Types\Message
     * @Todo: Test
     */
    public function forwardMessage($chat_id, $from_chat_id, $message_id,
        $disable_notification = null)
    {
        return new Types\Message($this->APICall('forwardMessage', array(
            'chat_id' => $chat_id,
            'from_chat_id' => $from_chat_id,
            'message_id' => $message_id,
            'disable_notification' => $disable_notification
        )));
    }

    /**
     * Send photos. On success, the sent Message is returned.
     *
     * @param int|string $chat_id
     * @param \CurlFile|string $photo
     * @param string|null $caption
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param Types\InlineKeyboardMarkup|Types\ReplyKeyboardMarkup|Types\ReplyKeyboardRemove|Types\ForceReply|null $reply_markup
     * @return Types\Message
     */
    public function sendPhoto($chat_id, $photo, $caption = null,
        $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return new Types\Message($this->APICall('sendPhoto', array(
            'chat_id' => $chat_id,
            'photo' => Types\InputFile::findFile($photo),
            'caption' => $caption,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => (string)$reply_markup
        )));
    }

    /**
     * Send audio files, if you want Telegram clients to display them in the
     * music player. Your audio must be in the .mp3 format.
     * On success, the sent Message is returned.
     *
     * @param int|string $chat_id
     * @param \CurlFile|string $audio
     * @param string|null $caption
     * @param int|null $duration
     * @param string|null $performer
     * @param string|null $title
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param Types\InlineKeyboardMarkup|Types\ReplyKeyboardMarkup|Types\ReplyKeyboardRemove|Types\ForceReply|null $reply_markup
     * @return Types\Message
     */
    public function sendAudio($chat_id, $audio, $caption = null, $duration = null,
        $performer = null, $title = null, $disable_notification = null,
        $reply_to_message_id = null, $reply_markup = null)
    {
        return new Types\Message($this->APICall('sendAudio', array(
            'chat_id' => $chat_id,
            'audio' => Types\InputFile::findFile($audio),
            'caption' => $caption,
            'duration' => $duration,
            'performer' => $performer,
            'title' => $title,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => (string)$reply_markup
        )));
    }

    /**
     * Send documents. On success, the sent Message is returned.
     *
     * @param int|string $chat_id
     * @param \CurlFile|string $document
     * @param string|null $caption
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param Types\InlineKeyboardMarkup|Types\ReplyKeyboardMarkup|Types\ReplyKeyboardRemove|Types\ForceReply|null $reply_markup
     * @return Types\Message
     * @Todo: Test
     */
    public function sendDocument($chat_id, $document, $caption = null,
        $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return new Types\Message($this->APICall('sendDocument', array(
            'chat_id' => $chat_id,
            'document' => Types\InputFile::findFile($document),
            'caption' => $caption,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => (string)$reply_markup
        )));
    }

    /**
     * Send stickers. On success, the sent Message is returned.
     *
     * @param int|string $chat_id
     * @param \CurlFile|string $sticker
     * @param string|null $caption
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param Types\InlineKeyboardMarkup|Types\ReplyKeyboardMarkup|Types\ReplyKeyboardRemove|Types\ForceReply|null $reply_markup
     * @return Types\Message
     * @Todo: Test
     */
    public function sendSticker($chat_id, $sticker, $caption = null,
        $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return new Types\Message($this->APICall('sendSticker', array(
            'chat_id' => $chat_id,
            'sticker' => Types\InputFile::findFile($sticker),
            'caption' => $caption,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => (string)$reply_markup
        )));
    }

    /**
     * Send video files, Telegram clients support mp4 videos (other formats may
     * be sent as Document). On success, the sent Message is returned.
     *
     * @param int|string $chat_id
     * @param \CurlFile|string $video
     * @param int|null $duration
     * @param int|null $width
     * @param int|null $height
     * @param string|null $caption
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param Types\InlineKeyboardMarkup|Types\ReplyKeyboardMarkup|Types\ReplyKeyboardRemove|Types\ForceReply|null $reply_markup
     * @return Types\Message
     * @Todo: Test
     */
    public function sendVideo($chat_id, $video, $duration = null,
        $width = null, $height = null, $caption = null,
        $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return new Types\Message($this->APICall('sendVideo', array(
            'chat_id' => $chat_id,
            'video' => Types\InputFile::findFile($video),
            'duration' => $duration,
            'width' => $width,
            'height' => $height,
            'caption' => $caption,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => (string)$reply_markup
        )));
    }

    /**
     * Send audio files, if you want Telegram clients to display the file as a playable voice message.
     * For this to work, your audio must be in an .ogg file encoded with OPUS (other formats may be sent as Audio
     * or Document). On success, the sent Message is returned.
     *
     * @param int|string $chat_id
     * @param \CurlFile|string $voice
     * @param int|null $duration
     * @param string|null $caption
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param Types\InlineKeyboardMarkup|Types\ReplyKeyboardMarkup|Types\ReplyKeyboardRemove|Types\ForceReply|null $reply_markup
     * @return Types\Message
     * @Todo: Test
     */
    public function sendVoice($chat_id, $voice, $duration = null, $caption = null,
        $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return new Types\Message($this->APICall('sendVoice', array(
            'chat_id' => $chat_id,
            'voice' => Types\InputFile::findFile($voice),
            'duration' => $duration,
            'caption' => $caption,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => (string)$reply_markup
        )));
    }

    /**
     * Send point on the map. On success, the sent Message is returned
     *
     * @param int|string $chat_id
     * @param float $latitude
     * @param float $longitude
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param Types\InlineKeyboardMarkup|Types\ReplyKeyboardMarkup|Types\ReplyKeyboardRemove|Types\ForceReply|null $reply_markup
     * @return Types\Message
     * @Todo: Test
     */
    public function sendLocation($chat_id, $latitude, $longitude, $disable_notification = null,
        $reply_to_message_id = null, $reply_markup = null)
    {
        return new Types\Message($this->APICall('sendLocation', array(
            'chat_id' => $chat_id,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => (string)$reply_markup
        )));
    }

    /**
     * Send information about a venue. On success, the sent Message is returned
     *
     * @param int|string $chat_id
     * @param float $latitude
     * @param float $longitude
     * @param string $title
     * @param string $address
     * @param string|null $foursquare_id
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param Types\InlineKeyboardMarkup|Types\ReplyKeyboardMarkup|Types\ReplyKeyboardRemove|Types\ForceReply|null $reply_markup
     * @return Types\Message
     * @Todo: Test
     */
    public function sendVenue($chat_id, $latitude, $longitude, $title, $address,
        $foursquare_id = null, $disable_notification = null,
        $reply_to_message_id = null, $reply_markup = null)
    {
        return new Types\Message($this->APICall('sendVenue', array(
            'chat_id' => $chat_id,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'title' => $title,
            'address' => $address,
            'foursquare_id' => $foursquare_id,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => (string)$reply_markup
        )));
    }

    /**
     * Send phone contacts. On success, the sent Message is returned
     *
     * @param int|string $chat_id
     * @param string $phone_number
     * @param string $first_name
     * @param string $last_name
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param Types\InlineKeyboardMarkup|Types\ReplyKeyboardMarkup|Types\ReplyKeyboardRemove|Types\ForceReply|null $reply_markup
     * @return Types\Message
     * @Todo: Test
     */
    public function sendContact($chat_id, $phone_number, $first_name, $last_name,
        $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return new Types\Message($this->APICall('sendContact', array(
            'chat_id' => $chat_id,
            'phone_number' => $phone_number,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => (string)$reply_markup
        )));
    }

    /**
     * Tell the user that something is happening on the bot's side. The status
     * is set for 5 seconds or less (when a message arrives from your bot,
     * Telegram clients clear its typing status). Returns True on success.
     *
     * @param int|string $chat_id
     * @param string $action
     * @return bool
     */
    public function sendChatAction($chat_id, $action)
    {
        return Types\Primitive::bool($this->APICall('sendChatAction', array(
            'chat_id' => $chat_id,
            'action' => $action
        )));
    }

    /**
     * Get a list of profile pictures for a user.
     *
     * @param int $user_id
     * @param int|null $offset
     * @param int|null $limit
     * @return Types\UserProfilePhotos
     */
    public function getUserProfilePhotos($user_id, $offset = null, $limit = null)
    {
        return new Types\UserProfilePhotos($this->APICall('getUserProfilePhotos', array(
            'user_id' => $user_id,
            'offset' => $offset,
            'limit' => $limit
        )));
    }

    /**
     * Get basic info about a file and prepare it for downloading.
     * For the moment, bots can download files of up to 20MB in size.
     * On success, a File object is returned. The file can then be downloaded via the link
     * https://api.telegram.org/file/bot<token>/<file_path>, where <file_path> is taken from the response.
     * It is guaranteed that the link will be valid for at least 1 hour.
     * When the link expires, a new one can be requested by calling getFile again.
     *
     * @param string $file_id
     * @return Types\File
     * @Todo: Test
     */
    public function getFile($file_id)
    {
        return new Types\File($this->APICall('getFile', array(
                'file_id' => $file_id
            )));
    }

    /**
     * Kick a user from a group or a supergroup. In the case of supergroups, the user will not be able to return to the
     * group on their own using invite links, etc., unless unbanned first.
     *
     * @param int|string $chat_id
     * @param int $user_id
     * @return bool
     * @Todo: Test
     */
    public function kickChatMember($chat_id, $user_id)
    {
        return Types\Primitive::bool($this->APICall('kickChatMember', array(
            'chat_id' => $chat_id,
            'user_id' =>$user_id
        )));
    }

    /**
     * Leave a group, supergroup or channel. Returns True on success.
     *
     * @param int|string $chat_id
     * @return Types\Message
     * @Todo: Test
     */
    public function leaveChat($chat_id)
    {
        return Types\Primitive::bool($this->APICall('leaveChat', array(
            'chat_id' => $chat_id
        )));
    }

    /**
     * Unban a previously kicked user in a supergroup.
     * The user will not return to the group automatically, but will be able to join via link, etc. The bot must be
     * an administrator in the group for this to work.
     * Returns True on success.
     *
     * @param string|int $chat_id
     * @param int $user_id
     * @return bool
     * @Todo: Test
     */
    public function unbanChatMember($chat_id, $user_id)
    {
        return Types\Primitive::bool($this->APICall('unbanChatMember', array(
            'chat_id' => $chat_id,
            'user_id' =>$user_id
        )));
    }

    /**
     * Get up to date information about the chat (current name of the user for one-on-one conversations,
     * current username of a user, group or channel, etc.)
     *
     * @param $chat_id String|Integer
     * @return Types\Chat
     * @Todo: Test
     */
    public function getChat($chat_id)
    {
        return new Types\Chat($this->APICall('getChat', array('chat_id' => $chat_id)));
    }

    /**
     * Get a list of administrators in a chat.
     * On success, returns an Array of ChatMember objects that contains
     * information about all chat administrators except other bots.
     * If the chat is a group or a supergroup and no administrators were
     * appointed, only the creator will be returned.
     *
     * @param $chat_id String|Integer
     * @return Types\User[]
     * @Todo: Test
     */
    public function getChatAdministrators($chat_id)
    {
        $adminsJson = $this->APICall('getChatAdministrators', array('chat_id' => $chat_id));
        $admins = array();
        foreach ($adminsJson['result'] as $admin) {
            $admins[] = new Types\User($admin);
        }
        return $admins;
    }

    /**
     * Get the number of members in a chat
     *
     * @param $chat_id String|int
     * @return int
     */
    public function getChatMembersCount($chat_id)
    {
        return Types\Primitive::int($this->APICall("getChatMembersCount", array("chat_id" => $chat_id)));
    }

    /**
     * Get information about a member of a chat
     *
     * @param $chat_id String|Integer
     * @param $user_id Integer
     * @return Types\ChatMember
     */
    public function getChatMember($chat_id, $user_id)
    {
        return new Types\ChatMember($this->APICall('getChatMember', array(
            'chat_id' => $chat_id,
            'user_id' => $user_id
        )));
    }

    /**
     * Send answers to callback queries sent from inline keyboards. The answer will
     * be displayed to the user as a notification at the top of the chat screen or as an alert.
     *
     * Alternatively, the user can be redirected to the specified Game URL. For this option to work,
     * you must first create a game for your bot via BotFather and accept the terms. Otherwise, you
     * may use links like telegram.me/your_bot?start=XXXX that open your bot with a parameter.
     *
     * Returns a status array
     *
     * @param string $callback_query_id
     * @param string $text
     * @param bool $show_alert
     * @param string $url
     * @param int $cache_time
     * @return array
     */
    public function answerCallbackQuery($callback_query_id, $text = "", $show_alert = false,
        $url ="" , $cache_time = 0)
    {
        return $this->APICall('answerCallbackQuery', array(
            'callback_query_id' => $callback_query_id,
            'text' => $text,
            'show_alert' => $show_alert,
            'url' => $url,
            'cache_time' => $cache_time
        ));
    }

    /**
     * Edit text and game messages sent by the bot or via the bot (for inline bots)
     *
     * @param string $text
     * @param string|int|null $chat_id
     * @param int|null $message_id
     * @param string|null $inline_message_id
     * @param string|null $parse_mode
     * @param bool|null $disable_web_page_preview
     * @param Types\InlineKeyboardMarkup|null $reply_markup
     * @throws \BadMethodCallException
     * @return Types\Message
     */
    public function editMessageText($text, $chat_id = null, $message_id = null,
        $inline_message_id = null, $parse_mode = null,
        $disable_web_page_preview = null, $reply_markup = null)
    {
        $params = array(
            'text' => $text,
            'parse_mode' => $parse_mode,
            'disable_web_page_preview' => $disable_web_page_preview,
            'reply_markup' => $reply_markup
        );
        if(isset($inline_message_id)){
            $params['inline_message_id'] = $inline_message_id;
        }elseif(isset($chat_id) && isset($message_id)){
            $params['chat_id'] = $chat_id;
            $params['message_id'] = $message_id;
        }else{
            throw new \BadMethodCallException("Must pass at least \$inline_message_id or \$chat_id and \$message_id");
        }

        $call = $this->APICall('editMessageText', $params);

        return $call;
    }

    /**
     * Edit captions of messages sent by the bot or via the bot (for inline bots)
     *
     * @param string $caption
     * @param string|int|null $chat_id
     * @param int|null $message_id
     * @param string|null $inline_message_id
     * @param Types\InlineKeyboardMarkup|null $reply_markup
     * @throws \BadMethodCallException
     * @return Types\Message
     */
    public function editMessageCaption($caption, $chat_id = null, $message_id = null,
        $inline_message_id = null, $reply_markup = null)
    {
        $params = array(
            'caption' => $caption,
            'reply_markup' => $reply_markup
        );
        if(isset($inline_message_id)){
            $params['inline_message_id'] = $inline_message_id;
        }elseif(isset($chat_id) && isset($message_id)){
            $params['chat_id'] = $chat_id;
            $params['message_id'] = $message_id;
        }else{
            throw new \BadMethodCallException("Must pass at least \$inline_message_id or \$chat_id and \$message_id");
        }

        $call = $this->APICall('editMessageCaption', $params);

        return $call;
    }

    /**
     * Edit only the reply markup of messages sent by the bot or via the bot (for inline bots).
     * On success, if edited message is sent by the bot, the edited Message is returned
     *
     * @param string|int|null $chat_id
     * @param int|null $message_id
     * @param string|null $inline_message_id
     * @param Types\InlineKeyboardMarkup|null $reply_markup
     * @throws \BadMethodCallException
     * @return Types\Message
     */
    public function editMessageReplyMarkup($chat_id = null, $message_id = null, $inline_message_id = null, $reply_markup = null)
    {
        $params = array(
            'reply_markup' => $reply_markup
        );
        if(isset($inline_message_id)){
            $params['inline_message_id'] = $inline_message_id;
        }elseif(isset($chat_id) && isset($message_id)){
            $params['chat_id'] = $chat_id;
            $params['message_id'] = $message_id;
        }else{
            throw new \BadMethodCallException("Must pass at least \$inline_message_id or \$chat_id and \$message_id");
        }

        return new Types\Message($this->APICall('editMessageReplyMarkup',$params));
    }

    /**
     * Send answers to an inline query. On success, True is returned.
     * No more than 50 results per query are allowed.
     * @param string $inline_query_id
     * @param Types\InlineQueryResult[] $results
     * @param int|null $cache_time
     * @param bool|null $is_personal
     * @param string|null $next_offset
     * @param string|null $switch_pm_text
     * @param string|null $switch_pm_parameter
     * @return bool
     * @Todo: Implement InlineQuery Types and Test
     */
    public function answerInlineQuery($inline_query_id, $results, $cache_time = null, $is_personal = null, $next_offset = null,
        $switch_pm_text = null, $switch_pm_parameter = null)
    {
        return $this->APICall('answerInlineQuery', array(
            'inline_query_id' => $inline_query_id,
            'results' => $results,
            'cache_time' => $cache_time,
            'is_personal' => $is_personal,
            'next_offset' => $next_offset,
            'switch_pm_text' => $switch_pm_text,
            'switch_pm_parameter' => $switch_pm_parameter
        ));
    }

    /**
     * Send a game
     * @param int $chat_id
     * @param string $game_short_name
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param Types\InlineKeyboardMarkup|null $reply_markup
     * @return Types\Message
     */
    public function sendGame($chat_id, $game_short_name, $disable_notification = null, $reply_to_message_id = null,
        $reply_markup = null)
    {
        return new Types\Message($this->APICall('sendGame', array(
            'chat_id' => $chat_id,
            'game_short_name' => $game_short_name,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup
        )));
    }

    /**
     * Set the score of the specified user in a game.
     * On success, if the message was sent by the bot, returns the edited Message, otherwise returns True.
     * Returns an error, if the new score is not greater than the user's current score in the chat and force is False.
     *
     * @param int $user_id
     * @param int $score
     * @param bool|null $force
     * @param bool|null $disable_edit_message
     * @param int|null $chat_id
     * @param int|null $message_id
     * @param string|null $inline_message_id
     * @return Types\Message
     * @throws \BadMethodCallException
     */
    public function setGameScore($user_id, $score, $force = null, $disable_edit_message = null, $chat_id = null,
        $message_id = null, $inline_message_id = null)
    {
        $params = array(
            'user_id' => $user_id,
            'score' => $score,
            'force' => $force,
            'disable_edit_message' => $disable_edit_message
        );

        if(isset($inline_message_id)){
            $params['inline_message_id'] = $inline_message_id;
        }elseif(isset($chat_id) && isset($message_id)){
            $params['chat_id'] = $chat_id;
            $params['message_id'] = $message_id;
        }else{
            throw new \BadMethodCallException("Must pass at least \$inline_message_id or \$chat_id and \$message_id");
        }

        return new Types\Message($this->APICall('setGameScore', $params));
    }

    /**
     * Get data for high score tables. Will return the score of the specified user and several of his neighbors in a game.
     * @param int $user_id
     * @param int|null $chat_id
     * @param int|null $message_id
     * @param string|null $inline_message_id
     * @return Types\GameHighScore[]
     * @throws \BadMethodCallException
     * @Todo: Test
     */
    public function getGameHighScores($user_id, $chat_id = null, $message_id = null, $inline_message_id = null)
    {
        $params = array(
            'user_id' => $user_id
        );
        if(isset($inline_message_id)){
            $params['inline_message_id'] = $inline_message_id;
        }elseif(isset($chat_id) && isset($message_id)){
            $params['chat_id'] = $chat_id;
            $params['message_id'] = $message_id;
        }else{
            throw new \BadMethodCallException("Must pass at least \$inline_message_id or \$chat_id and \$message_id");
        }
        $scoresJSON = $this->APICall('getGameHighScores', $params);

        $scores = array();

        foreach ($scoresJSON['result'] as $score){
            $scores[] = new Types\GameHighScore($score);
        }
        return $scores;
    }

    /**
     * Use this method to generate a new invite link for a chat; any previously generated link is revoked.
     * The bot must be an administrator in the chat for this to work and must have the appropriate admin rights.
     * Returns the new invite link as String on success.
     * @param int|string $chat_id chat id or @channelUsername
     * @return string
     * @throws \BadMethodCallException
     * @Todo: Test
     */
    public function exportChatInviteLink($chat_id)
    {
        return $this->APICall('exportChatInviteLink', array(
            'chat_id' => $chat_id
        ));
    }
}
