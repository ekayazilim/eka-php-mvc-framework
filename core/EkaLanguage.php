<?php
namespace EkaYazilim\core;

use EkaYazilim\config\app;

class EkaLanguage {
    public function load(): array {
        $defaultLang = app::get()['default_language'] ?? 'tr';
        $sessionLang = $_SESSION['lang'] ?? $defaultLang;
        
        $langFile = ROOT_PATH . "/lang/{$sessionLang}.json";
        if (file_exists($langFile)) {
            $content = file_get_contents($langFile);
            return json_decode($content, true) ?? [];
        }
        
        return [];
    }

    public static function setLanguage(string $lang): void {
        $_SESSION['lang'] = $lang;
    }
}
