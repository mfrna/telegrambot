<?php

namespace MFRNA\TelegramBot\Tests;

class BotTest extends \PHPUnit_Framework_TestCase
{
    public function testBotClassCanBeInitialized()
    {
        $bot = new \MFRNA\TelegramBot\API\Bot('295916498:AAEDt5C_bMxWh0xHGul9QInQrMeZHAW8aNc');
        $this->assertTrue(is_a($bot, \MFRNA\TelegramBot\API\Bot::class));
    }

}
