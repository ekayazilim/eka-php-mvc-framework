<?php
namespace EkaYazilim\config;

class app {
    public static function get() {
        return [
            'name' => 'Eka PHP MVC Framework',
            'env' => 'production',
            'debug' => true,
            'default_language' => 'tr',
            'url' => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"
        ];
    }
}
