<?php

namespace MFRNA\TelegramBot\Types;

/**
 * Class InputFile
 * @package MFRNA\TelegramBot\Types
 */
class InputFile extends Type
{
    protected $path;
    protected $file;

    public function __construct($file_path)
    {
        $this->path = realpath($file_path);
        $this->file = new \CURLFile($this->path);
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return \CURLFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param $file_path
     * @return static
     */
    public static function init($file_path)
    {
        return new static($file_path);
    }

    public static function findFile($file)
    {
        if (is_a($file, static::class)){
            // if it is an InputFile, get curl handle,
            return $file->getFile();
        }else{
            if(is_file($file) && is_readable($file)
                && (filter_var($file,FILTER_VALIDATE_URL) === false)){
                // if $file is physical file, get a curl handle,
                return self::init($file)->getFile();
            }else{
                // assume it's a telegram file_id or a url
                return $file;
            }
        }
    }
}