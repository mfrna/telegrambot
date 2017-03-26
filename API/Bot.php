<?php
namespace MFRNA\TelegramBot\API;

use MFRNA\TelegramBot\Excptions\HttpException;
use MFRNA\TelegramBot\Excptions\JSONException;
use MFRNA\TelegramBot\Contracts\ResponseInterface;
use MFRNA\TelegramBot\Types;

class Bot{
    
    protected $api_url = 'https://api.telegram.org/bot';
    private $response;

    const HTTP_CODE_OK = 200;


    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * @param $url
     */
    public function setWebHook($url)
    {
        $this->APICall('setWebHook',['url' => $url]);
    }

    /**
     * @param $method
     * @param array $params
     * @return mixed
     */
    public function APICall($method, array $params)
    {
        $options = array(
            CURLOPT_URL => $this->api_url . '/' . $method,
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

            if(($httpCode = curl_getinfo($curlRes, CURLINFO_HTTP_CODE)) && $httpCode !== HTTP_CODE_OK) {
                throw new HttpException($httpCode);
            }
            
            $response = $this->response->handle($result);
        } catch(Exception $e) {
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

    public function sendMessage()
    {
        # code...
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