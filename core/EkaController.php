<?php
namespace EkaYazilim\core;

abstract class EkaController {
    protected EkaRequest $request;
    protected EkaResponse $response;

    public function __construct() {
        $this->request = new EkaRequest();
        $this->response = new EkaResponse();
    }

    protected function render(string $view, array $params = [], string $layout = 'main') {
        $language = new EkaLanguage();
        $params['lang'] = $language->load();
        
        extract($params);

        ob_start();
        $viewPath = ROOT_PATH . "/app/Views/{$view}.php";
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            EkaLogger::log("Görünüm bulunamadı: {$viewPath}");
            echo "Görünüm bulunamadı.";
        }
        $content = ob_get_clean();

        $layoutPath = ROOT_PATH . "/app/Views/layouts/{$layout}.php";
        if (file_exists($layoutPath)) {
            include $layoutPath;
        } else {
            EkaLogger::log("Layout bulunamadı: {$layoutPath}");
            echo $content;
        }
    }
}
