<?php
namespace EkaYazilim\app\Controllers;

use EkaYazilim\core\EkaController;

class HomeController extends EkaController {
    public function index() {
        $data = [
            'title' => 'Eka MVC Framework',
            'description' => 'Modern PHP MVC Framework',
        ];
        $this->render('home', $data);
    }
}
