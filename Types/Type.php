<?php

namespace MFRNA\TelegramBot\Types;

use MFRNA\TelegramBot\Exceptions\InvalidPropertyException;
use MFRNA\TelegramBot\Exceptions\NotWritablePropertyException;

abstract class Type implements \JsonSerializable{

    protected $props;
    protected $validProps;
    protected $readOnly;

    public function __construct(array $response)
    {
        $this->props = $response['result'];
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
        if(in_array($name, $this->readOnly)){
            throw new NotWritablePropertyException("Property ". $name . " is not writeable in " . get_class($this));
        }
        if(!in_array($name, $this->validProps)){
            throw new InvalidPropertyException("Property ". $name . " does not exist in " . get_class($this));
        }

        $this->props[$name] = $value;
	}

    public function __get($name)
    {
        if(!in_array($name, $this->validProps)){
            throw new InvalidPropertyException("Property ". $name . " does not exist in " . get_class($this));
        }
        return $this->props[$name];
	}
}