<?php
namespace EkaYazilim\app\Controllers;

use EkaYazilim\core\EkaController;
use EkaYazilim\app\Models\User;
use EkaYazilim\core\EkaAuth;

class AuthController extends EkaController {
    public function loginForm() {
        $this->render('auth/login', ['title' => 'Giriş Yap']);
    }

    public function login() {
        $email = $this->request->post('email');
        $password = $this->request->post('password');

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            EkaAuth::login($user);
            $this->response->redirect('/admin/dashboard');
        } else {
            $_SESSION['error'] = 'E-posta veya şifre hatalı.';
            $this->response->redirect('/login');
        }
    }

    public function logout() {
        EkaAuth::logout();
        $this->response->redirect('/login');
    }
}
