<?php
namespace EkaYazilim\core;

use PDO;
use PDOException;
use EkaYazilim\config\database;

class EkaDatabase {
    private static ?PDO $instance = null;

    public static function getConnection(): PDO {
        if (self::$instance === null) {
            $config = database::get();
            try {
                $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
                self::$instance = new PDO($dsn, $config['username'], $config['password'], $options);
            } catch (PDOException $e) {
                EkaLogger::log("Veritabanı bağlantı hatası: " . $e->getMessage());
                die("Sistem Hatası: Veritabanına ulaşılamıyor.");
            }
        }
        return self::$instance;
    }
}
