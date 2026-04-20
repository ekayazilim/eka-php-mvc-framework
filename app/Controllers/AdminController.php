<?php
namespace EkaYazilim\app\Controllers;

use EkaYazilim\core\EkaController;
use EkaYazilim\core\EkaAuth;

class AdminController extends EkaController {
    public function index() {
        $user = EkaAuth::user();
        $this->render('admin/dashboard', [
            'title' => 'Yönetim Paneli',
            'user' => $user
        ], 'admin');
    }
}
