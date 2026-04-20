<?php
namespace EkaYazilim\config;

class database {
    public static function get() {
        return [
            'host' => 'localhost',
            'database' => 'eka_framework',
            'username' => 'root',
            'password' => 'ServBay.dev',
            'charset' => 'utf8mb4'
        ];
    }
}
