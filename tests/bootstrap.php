<?php
if (!class_exists('\PHPUnit\Framework\TestCase') &&
    class_exists('\PHPUnit_Framework_TestCase')) {
    class_alias('\PHPUnit_Framework_TestCase', '\PHPUnit\Framework\TestCase');
}
spl_autoload_register(function($class) {
    if (strpos($class, 'MFRNA') !== False) {
        $filepath = str_replace('MFRNA\TelegramBot\\', '', $class);
        require(__DIR__ . '/../' . strtr($filepath, '\\', DIRECTORY_SEPARATOR) . '.php');
    }
});
