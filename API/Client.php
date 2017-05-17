<?php
/**
 * Created by PhpStorm.
 * User: mfarag
 * Date: 04/05/17
 * Time: 09:38 م
 */

namespace mfrna\telegrambot\API;


interface Client
{
    public function post($method, array $params = array());
    public function setApiUrl($api_url);
    public function setToken($token);
}