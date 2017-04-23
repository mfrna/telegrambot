<?php

namespace MFRNA\TelegramBot\Types;

use MFRNA\TelegramBot\Exceptions\InvalidPropertyException;
use MFRNA\TelegramBot\Exceptions\NotWritablePropertyException;

abstract class Type implements \JsonSerializable{

    protected $props;
    protected $validProps;
    protected $readOnly;
    protected $objectTypes;

    public function __construct(array $response, $resultOnly = false)
    {
        if(!$resultOnly){
            $response = $response['result'];
        }
        if(is_array($this->objectTypes) && count($this->objectTypes)){
            foreach ($this->objectTypes as $objectType => $class){
                // handle multi value response, e.g. entities
                if(!empty($response[$objectType]) && is_array($class )){
                    foreach ($response[$objectType] as $subobjk => $subobjv){
                        if(is_array($class[0])){ // array of array of objects, e.g. PhotoSizes
                            $class = $class[0][0];
                            foreach ($subobjv as $subsubobjk => $subsubobjv){
                                $response[$objectType][$subobjk][$subsubobjk] = new $class($subsubobjv, true);
                            }
                        }else{ // array of objects, e.g. MessageEntities
                            list($class) = $class;
                            if(class_exists($class)){
                                $response[$objectType][$subobjk] = new $class($subobjv, true);
                            } else {
                                $response[$objectType][$subobjk] = new MessageEntity($subobjv, true);
                            }
                        }
                    }

                    // handle single value objects, e.g. user
                }elseif(!empty($response[$objectType])){
                    $response[$objectType] = new $class($response[$objectType], true);
                }

            }
        }

        $this->props = $response;
    }

	public function __toString()
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