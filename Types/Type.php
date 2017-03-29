<?php

namespace MFRNA\TelegramBot\Types;

use MFRNA\TelegramBot\Exceptions\InvalidPropertyException;
use MFRNA\TelegramBot\Exceptions\NotWritablePropertyException;

abstract class Type implements \JsonSerializable{

    protected $props;
    protected $validProps;
    protected $readOnly;

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

    public function __set($name,$value)
    {
//        var_dump($this);exit;
        if(in_array($name, $this->readOnly)){
            throw new NotWritablePropertyException("Property ". $name . " is not writeable in " . get_class($this));
        }
        if(!in_array($name, $this->validProps)){
            throw new InvalidPropertyException("Property ". $name . " does not exist in " . get_class($this));
        }

        $this->props[$name] = $value;
	}
}