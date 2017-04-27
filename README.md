# TelegramBot API
A composer package for Telegram bots API

# Overview

Telegram Bot API is an HTTP-based interface created for developers keen on building bots for Telegram.

To learn more about the Telegram Bot API, please consult the [Introduction to Bots](https://core.telegram.org/bots) and [Bot FAQ](https://core.telegram.org/bots/faq) on official Telegram site.

This API library aims to making using the API as easy as reading the API Docs, every method is implemented identical to its description in the API docs and objects are autocreated from API responses.

If you have any questions, don't hesitate to contact me.

# Usage

Install the pacakge

    composer require mfrna/telegrambot
Use it!

    use MFRNA\TelegramBot\API\Bot;

	$bot = new BOT(YOUR_API_KEY);
	$me = $bot->getMe();
	echo $me->username;

As easy as that!
