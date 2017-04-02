<?php
namespace MFRNA\TelegramBot\API;

use MFRNA\TelegramBot\Exceptions\HttpException;
use MFRNA\TelegramBot\Exceptions\APICallException;
use MFRNA\TelegramBot\Contracts\ResponseInterface;
use MFRNA\TelegramBot\Types;

class Bot{
    
    protected $api_url = 'https://api.telegram.org/bot';
    protected $token;
    private $response;
    private $file_upload = false;

    const HTTP_CODE_OK = 200;


    public function __construct(ResponseInterface $response, $token)
    {
        $this->response = $response;
        $this->token = $token;
    }

    /**
     * Use this method to specify a url and receive incoming updates via an outgoing webhook.
     * Whenever there is an update for the bot, Telegram will send an HTTPS POST request to the specified url,
     * containing a JSON-serialized Update. In case of an unsuccessful request, Telegram will give up after a
     * reasonable amount of attempts.
     * @param $url
     */
    public function setWebHook($url)
    {
        return $this->APICall('setWebHook',['url' => $url]);
    }

    /**
     * Main Gateway for API Communications
     * @param $method
     * @param array $params
     * @throws APICallException
     * @return mixed
     */
    protected function APICall($method, array $params = [])
    {
        $options = array(
            CURLOPT_URL => $this->api_url . $this->token. '/' . $method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => null,
            CURLOPT_POSTFIELDS => null
        );

        if (!empty($params)) {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = $params;
        }

        if($this->file_upload){
            $options[CURLOPT_HTTPHEADER] = ["Content-Type:multipart/form-data"];
        }

        try{
            $curlRes = curl_init();
            curl_setopt_array($curlRes, $options);
            $result = curl_exec($curlRes);

            if(($httpCode = curl_getinfo($curlRes, CURLINFO_HTTP_CODE)) && $httpCode !== self::HTTP_CODE_OK) {
                $result = json_decode($result);
                throw new HttpException($result->description ,$httpCode);
            }
            
            $response = $this->response->handle($result);
        } catch(\Exception $e) {
            throw new APICallException($e->getMessage(), $e->getCode(), $e);
        }

        return $response;
    }

    /**
    * A simple method for testing your bot's auth token.
    * Returns basic information about the bot in form of a User object.
    *
    * @Return Types\User
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
    public function sendMessage($chat_id, $text, $parse_mode = null, $disable_web_page_preview = null,
                                $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return new Types\Message($this->APICall('sendMessage',[
                'chat_id' => $chat_id,
                'text' => $text,
                'parse_mode' => $parse_mode,
                'disable_web_page_preview' => $disable_web_page_preview,
                'disable_notification' => $disable_notification,
                'reply_to_message_id' => $reply_to_message_id,
                'reply_markup' => (string)$reply_markup
        ]));
    }

    /**
     * Forward messages of any kind. On success, the sent Message is returned
     *
     * @param int|string $chat_id
     * @param int|string $from_chat_id
     * @param int $message_id
     * @param bool $disable_notification
     * @return Types\Message
     */
    public function forwardMessage($chat_id, $from_chat_id, $message_id, $disable_notification = null)
    {
        return new Types\Message($this->APICall('forwardMessage', [
            'chat_id' => $chat_id,
            'from_chat_id' => $from_chat_id,
            'message_id' => $message_id,
            'disable_notification' => $disable_notification
        ]));
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
    public function sendPhoto($chat_id, $photo, $caption = null, $disable_notification = null,
                              $reply_to_message_id = null, $reply_markup = null)
    {
        return new Types\Message($this->APICall('sendPhoto', [
            'chat_id' => $chat_id,
            'photo' => Types\InputFile::findFile($photo),
            'caption' => $caption,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => (string)$reply_markup
        ]));
    }

    public function sendAudio()
    {
        # code...
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
     */
    public function sendDocument($chat_id, $document, $caption = null, $disable_notification = null,
                                 $reply_to_message_id = null, $reply_markup = null)
    {
        return new Types\Message($this->APICall('sendDocument', [
            'chat_id' => $chat_id,
            'document' => Types\InputFile::findFile($document),
            'caption' => $caption,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => (string)$reply_markup
        ]));
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
     */
    public function sendSticker($chat_id, $sticker, $caption = null, $disable_notification = null,
                                 $reply_to_message_id = null, $reply_markup = null)
    {
        return new Types\Message($this->APICall('sendSticker', [
            'chat_id' => $chat_id,
            'sticker' => Types\InputFile::findFile($sticker),
            'caption' => $caption,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => (string)$reply_markup
        ]));
    }

    public function sendVideo()
    {
        # code...
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
     */
    public function sendVoice($chat_id, $voice, $duration = null, $caption = null, $disable_notification = null,
                                $reply_to_message_id = null, $reply_markup = null)
    {
        return new Types\Message($this->APICall('sendVoice', [
            'chat_id' => $chat_id,
            'voice' => Types\InputFile::findFile($voice),
            'duration' => $duration,
            'caption' => $caption,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => (string)$reply_markup
        ]));
    }

    public function sendLocation()
    {
        # code...
    }

    public function sendVenue()
    {
        # code...
    }

    public function sendContact()
    {
        # code...
    }

    public function sendChatAction()
    {
        # code...
    }

    public function getUserProfilePhotos()
    {
        # code...
    }

    public function getFile()
    {
        # code...
    }

    public function kickChatMember()
    {
        # code...
    }

    public function leaveChat()
    {
        # code...
    }

    public function unbanChatMember()
    {
        # code...
    }

    /**
     * Get up to date information about the chat (current name of the user for one-on-one conversations,
     * current username of a user, group or channel, etc.)
     *
     * @param $chat_id String|Integer
     * @return Chat
     */
    public function getChat($chat_id)
    {
        return new Types\Chat($this->APICall('getChat', ['chat_id' => $chat_id]));
    }

    /**
     * Get a list of administrators in a chat.
     * On success, returns an Array of ChatMember objects that contains information about all chat administrators
     * except other bots.
     * If the chat is a group or a supergroup and no administrators were appointed, only the creator will be returned.
     * 
     * @param $chat_id String|Integer
     * @return User[]
     */
    public function getChatAdministrators($chat_id)
    {
        $adminsJson = $this->APICall('getChatAdministrators',['chat_id' => $chat_id]);
        $admins = array();
        foreach ($adminsJson as $admin) {
            $admins[] = new Types\User($admin);
        }
        return $admins;
    }

    /**
     * Get the number of members in a chat
     *
     * @param $chat_id String|Integer
     * @return Integer
     */
    public function getChatMembersCount($chat_id)
    {
        return $this->APICall("getChatMembersCount",["chat_id" => $chat_id]);
    }

    /**
     * Get information about a member of a chat
     *
     * @param $chat_id String|Integer
     * @param $user_id Integer
     * @return ChatMember
     */
    public function getChatMember($chat_id, $user_id)
    {
        return new Types\ChatMember($this->APICall('getChatMember',[
            'chat_id' => $chat_id,
            'user_id' => $user_id
        ]));
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
        return $this->APICall('answerCallbackQuery', [
            'callback_query_id' => $callback_query_id,
            'text' => $text,
            'show_alert' => $show_alert,
            'url' => $url,
            'cache_time' => $cache_time
        ]);
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
     * @return Types\Message
     * @throws APICallException
     * @throws \BadMethodCallException
     */
    public function editMessageText($text, $chat_id = null, $message_id = null, $inline_message_id = null,
                                    $parse_mode = null, $disable_web_page_preview = null, $reply_markup = null)
    {
        $params = [
            'text' => $text,
            'parse_mode' => $parse_mode,
            'disable_web_page_preview' => $disable_web_page_preview,
            'reply_markup' => $reply_markup
        ];
        if(isset($inline_message_id)){
            $params['inline_message_id'] = $inline_message_id;
        }elseif(isset($chat_id) && isset($message_id)){
            $params['chat_id'] = $chat_id;
            $params['message_id'] = $message_id;
        }else{
            throw new \BadMethodCallException("Must pass at least \$inline_message_id or \$chat_id and \$message_id");
        }
        try{
            $call = $this->APICall('editMessageText', $params);
        }catch (HttpException $e){
            throw new APICallException($e->getMessage(),$e->getCode(),$e);
        }

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
     * @return Types\Message
     * @throws APICallException
     * @throws \BadMethodCallException
     */
    public function editMessageCaption($caption, $chat_id = null, $message_id = null, $inline_message_id = null,
                                       $reply_markup = null)
    {
        $params = [
            'caption' => $caption,
            'reply_markup' => $reply_markup
        ];
        if(isset($inline_message_id)){
            $params['inline_message_id'] = $inline_message_id;
        }elseif(isset($chat_id) && isset($message_id)){
            $params['chat_id'] = $chat_id;
            $params['message_id'] = $message_id;
        }else{
            throw new \BadMethodCallException("Must pass at least \$inline_message_id or \$chat_id and \$message_id");
        }
        try{
            $call = $this->APICall('editMessageCaption', $params);
        }catch (HttpException $e){
            throw new APICallException($e->getMessage(),$e->getCode(),$e);
        }

        return $call;
    }

    public function editMessageReplyMarkup()
    {
        # code...
    }

    public function answerInlineQuery()
    {
        # code...
    }

    public function sendGame()
    {
        # code...
    }

    public function setGameScore()
    {
        # code...
    }

    public function getGameHighScores()
    {
        # code...
    }
}