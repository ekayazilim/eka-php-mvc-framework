<?php
namespace EkaYazilim\core;

class EkaAuth {
    public static function check(): bool {
        return isset($_SESSION['user_id']);
    }

    public static function user() {
        return self::check() ? $_SESSION['user_data'] : null;
    }

    public static function login(array $user): void {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_data'] = $user;
    }

    public static function logout(): void {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_data']);
        session_destroy();
    }
}
