<?php
namespace MFRNA\TelegramBot\Contracts;

interface ResponseInterface{
    public function handle($curl_response);
}

?>