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

        
        try{
            $curlRes = curl_init();
            curl_setopt_array($curlRes, $options);
            $result = curl_exec($curlRes);

            if(($httpCode = curl_getinfo($curlRes, CURLINFO_HTTP_CODE)) && $httpCode !== self::HTTP_CODE_OK) {
                throw new HttpException($httpCode);
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

    public function sendMessage($chat_id, $text, $parse_mode = null,$disable_web_page_preview = null,
                                $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        return $this->APICall('sendMessage',[
                'chat_id' => $chat_id,
                'text' => $text,
                'parse_mode' => $parse_mode,
                'disable_web_page_preview' => $disable_web_page_preview,
                'disable_notification' => $disable_notification,
                'reply_to_message_id' => $reply_to_message_id,
                'reply_markup' => $reply_markup
        ]);
    }

    public function forwardMessage()
    {
        # code...
    }

    public function sendPhoto()
    {
        # code...
    }

    public function sendAudio()
    {
        # code...
    }

    public function sendDocument()
    {
        # code...
    }

    public function sendSticker()
    {
        # code...
    }

    public function sendVideo()
    {
        # code...
    }

    public function sendVoice()
    {
        # code...
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

    public function answerCallbackQuery()
    {
        # code...
    }

    public function editMessageText()
    {
        # code...
    }

    public function editMessageCaption()
    {
        # code...
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