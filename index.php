<?php
session_start();

define('ROOT_PATH', __DIR__);

spl_autoload_register(function ($class) {
    if (str_starts_with($class, 'EkaYazilim\\')) {
        $class = str_replace('EkaYazilim\\', '', $class);
        $file = ROOT_PATH . '/' . str_replace('\\', '/', $class) . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
});

require_once ROOT_PATH . '/routes/web.php';
