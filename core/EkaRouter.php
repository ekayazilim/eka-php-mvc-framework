<?php
namespace EkaYazilim\core;

use Exception;

class EkaRouter {
    private array $routes = [];
    private EkaRequest $request;
    private EkaResponse $response;

    public function __construct(EkaRequest $request, EkaResponse $response) {
        $this->request = $request;
        $this->response = $response;
    }

    public function get(string $path, array $callback, array $middlewares = []): void {
        $this->routes['GET'][$path] = ['callback' => $callback, 'middlewares' => $middlewares];
    }

    public function post(string $path, array $callback, array $middlewares = []): void {
        $this->routes['POST'][$path] = ['callback' => $callback, 'middlewares' => $middlewares];
    }

    public function dispatch(): void {
        $url = $this->request->getUrl();
        $method = $this->request->getMethod();
        
        foreach ($this->routes[$method] ?? [] as $route => $config) {
            $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<\1>[a-zA-Z0-9_-]+)', $route);
            $pattern = str_replace('/', '\/', $pattern);
            
            if (preg_match('/^' . $pattern . '$/', $url, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                
                // Middleware Check
                foreach ($config['middlewares'] as $middlewareClass) {
                    $middleware = new $middlewareClass();
                    if (!$middleware->handle($this->request, $this->response)) {
                        return;
                    }
                }

                $callback = $config['callback'];
                if (is_array($callback)) {
                    $controller = new $callback[0]();
                    call_user_func_array([$controller, $callback[1]], $params);
                    return;
                }
            }
        }
        
        $this->response->setStatusCode(404);
        EkaLogger::log("404 Bulunamadı: {$url}", "WARNING");
        echo "404 - Sayfa Bulunamadı";
    }
}
