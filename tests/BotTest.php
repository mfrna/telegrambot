<?php

namespace MFRNA\TelegramBot\Tests;

use \PHPUnit\Framework\TestCase;

class BotTest extends TestCase
{
    public function testBotClassCanBeInitialized()
    {
        $bot = new \MFRNA\TelegramBot\API\Bot('295916498:AAEDt5C_bMxWh0xHGul9QInQrMeZHAW8aNc');
        $this->assertTrue(is_a($bot, \MFRNA\TelegramBot\API\Bot::class));
    }

}
