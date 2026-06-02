<?php
class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            if ($email === 'admin@exploretumbes.com') {
                header('Location: ' . route('admin'));
                exit;
            }
            if ($email) {
                header('Location: ' . route('home'));
                exit;
            }
        }

        view('auth/login.php');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Location: ' . route('home'));
            exit;
        }

        view('auth/register.php');
    }
}
