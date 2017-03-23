<?php

namespace MFRNA\TelegramBot\Types;

class Chat{

	protected $props;

	public function __construct(array $chat)
	{
		$this->props = $chat;
	}
}