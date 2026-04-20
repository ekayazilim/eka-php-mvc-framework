<?php
namespace EkaYazilim\app\Middlewares;

use EkaYazilim\core\EkaMiddleware;
use EkaYazilim\core\EkaRequest;
use EkaYazilim\core\EkaResponse;
use EkaYazilim\core\EkaAuth;

class GuestMiddleware implements EkaMiddleware {
    public function handle(EkaRequest $request, EkaResponse $response): bool {
        if (EkaAuth::check()) {
            $response->redirect('/admin/dashboard');
            return false;
        }
        return true;
    }
}
