<?php
namespace MFRNA\TelegramBot\API;

use MFRNA\TelegramBot\Exceptions\JSONException;
use MFRNA\TelegramBot\Contracts\ResponseInterface;

/**
* 
*/
class Response implements ResponseInterface
{
    
    public function handle($curl_response)
    {
        $json = json_decode($curl_response, true);
        if(!$json) {
            throw new JSONException("Empty JSON returned", 1);
        }

        return $json;
    }
}
?>