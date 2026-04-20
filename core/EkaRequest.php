<?php
namespace EkaYazilim\core;

class EkaRequest {
    public function getMethod(): string {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getUrl(): string {
        $url = $_GET['url'] ?? '/';
        return '/' . trim($url, '/');
    }

    public function get(string $key, $default = null) {
        return $_GET[$key] ?? $default;
    }

    public function post(string $key, $default = null) {
        return $_POST[$key] ?? $default;
    }

    public function all(): array {
        return $_REQUEST;
    }
}
