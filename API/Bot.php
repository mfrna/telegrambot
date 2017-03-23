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

    public function setWebHook($url)
    {
        $this->APICall('setWebHook',['url' => $url]);
    }

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
    
    public function getChat($chat_id)
    {
        return new Type\Chat($this->APICall('getChat', ['chat_id' => $chat_id]));
    }
    
    public function getChatAdministrators()
    {
        # code...
    }
    
    public function getChatMembersCount()
    {
        # code...
    }
    
    public function getChatMember()
    {
        # code...
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