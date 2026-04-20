<?php
namespace EkaYazilim\routes;

use EkaYazilim\core\EkaRouter;
use EkaYazilim\core\EkaRequest;
use EkaYazilim\core\EkaResponse;
use EkaYazilim\app\Controllers\HomeController;
use EkaYazilim\app\Controllers\AuthController;
use EkaYazilim\app\Controllers\AdminController;
use EkaYazilim\app\Middlewares\AuthMiddleware;
use EkaYazilim\app\Middlewares\GuestMiddleware;

$request = new EkaRequest();
$response = new EkaResponse();
$router = new EkaRouter($request, $response);

$router->get('/', [HomeController::class, 'index']);

$router->get('/login', [AuthController::class, 'loginForm'], [GuestMiddleware::class]);
$router->post('/login', [AuthController::class, 'login'], [GuestMiddleware::class]);
$router->get('/logout', [AuthController::class, 'logout'], [AuthMiddleware::class]);

$router->get('/admin/dashboard', [AdminController::class, 'index'], [AuthMiddleware::class]);

$router->dispatch();
