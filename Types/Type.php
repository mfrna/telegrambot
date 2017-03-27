<?php

namespace MFRNA\TelegramBot\Types;

abstract class Type implements \JsonSerializable{

    protected $props;

    public function __construct(array $props)
    {
        $this->props = $props;
    }

	public function __ToString()
	{
		return json_encode($this->props);
	}

	public function jsonSerialize()
	{
		return $this->props;
	}
}