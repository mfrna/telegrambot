<?php
spl_autoload_register(function($class) {
    if (strpos($class, 'MFRNA') !== False) {
        $filepath = str_replace('MFRNA\TelegramBot\\', '', $class);
        require(__DIR__ . '/../' . strtr($filepath, '\\', DIRECTORY_SEPARATOR) . '.php');
    }
});
