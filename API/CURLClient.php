<?php

namespace MFRNA\TelegramBot\API;

use MFRNA\TelegramBot\Exceptions\HttpException;
use MFRNA\TelegramBot\Exceptions\APICallException;
use MFRNA\TelegramBot\Exceptions\JSONException;

class CURLClient
{
    const HTTP_CODE_OK = 200;

    public function __construct($url, $token)
    {
        $this->api_url = $url;
        $this->token = $token;
    }
    public function post($method, array $params = array())
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

            $response = json_decode($result, true);
            if(!$response) {
                throw new JSONException("Empty JSON returned", 1);
            }

        } catch(\Exception $e) {
            throw new APICallException($e->getMessage(), $e->getCode(), $e);
        }

        return $response;
    }
}