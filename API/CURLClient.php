<?php

namespace MFRNA\TelegramBot\API;

use MFRNA\TelegramBot\Exceptions\HttpException;
use MFRNA\TelegramBot\Exceptions\APICallException;
use MFRNA\TelegramBot\Exceptions\JSONException;

class CURLClient implements Client
{
    const HTTP_CODE_OK = 200;
    private $api_url;
    private $token;
    private $file_upload;

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

    /**
     * @return mixed
     */
    public function getApiUrl()
    {
        return $this->api_url;
    }

    /**
     * @param mixed $api_url
     */
    public function setApiUrl($api_url)
    {
        $this->api_url = $api_url;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }
}
