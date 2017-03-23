<?php
namespace MFRNA\TelegramBot\API;

use MFRNA\TelegramBot\Excptions\HttpException;
use MFRNA\TelegramBot\Excptions\JSONException;
use MFRNA\TelegramBot\Contracts\ResponseInterface;

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
		$this->APICall('setWebHook',[$url]);
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
	        try{
        		$response = $this->response->handle($result);
	        } catch(JSONException $e) {
	        	throw new APICallException($e->getMessage(), $e->getCode(), $e);
	        	
	        }
        } catch(HttpException $e) {
        	throw new APICallException($e->getMessage(), $e->getCode(), $e);
        	
        }

        return $response;
	}
}