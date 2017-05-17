<?php

namespace MFRNA\TelegramBot\Tests;

use \PHPUnit\Framework\TestCase;

class BotTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->stub = $this->getMockBuilder('\MFRNA\TelegramBot\API\Client')->setMethods(array('post','setApiUrl','setToken'))->getMock();
    }
    public function testBotClassCanBeInitialized()
    {
        $bot = new \MFRNA\TelegramBot\API\Bot('295916498:AAEDt5C_bMxWh0xHGul9QInQrMeZHAW8aNc', $this->stub);
        $this->assertTrue(is_a($bot, \MFRNA\TelegramBot\API\Bot::class));
    }

    public function testBotCanGetChat()
    {
        $mockArr = array(
                    'ok'=>true,
                    'result'=>array(
                        "id"=>284968792,
                        "first_name"=>"Mohamed",
                        "last_name"=>"Farag",
                        "username"=> "mfarag",
                        "type"=> "private"
                        )
                    );
        
        $this->stub->expects($this->any())->method('post')->willReturn($mockArr);

        $bot = new \MFRNA\TelegramBot\API\Bot('295916498:AAEDt5C_bMxWh0xHGul9QInQrMeZHAW8aNc', $this->stub);
        $chat = $bot->getChat(284968792);
        $this->assertInstanceOf(\MFRNA\TelegramBot\Types\Chat::class, $chat);
    }

    public function testBotCanGetMe()
    {
        $mockArr = array(
                    'ok'=>true,
                    'result'=>array(
                        "id"=>284968792,
                        "first_name"=>"Mohamed",
                        "last_name"=>"Farag",
                        "username"=> "mfarag"
                        )
                    );
        
        $this->stub->expects($this->any())->method('post')->willReturn($mockArr);

        $bot = new \MFRNA\TelegramBot\API\Bot('295916498:AAEDt5C_bMxWh0xHGul9QInQrMeZHAW8aNc', $this->stub);
        $user = $bot->getMe();
        $this->assertInstanceOf(\MFRNA\TelegramBot\Types\User::class, $user);
    }
}
