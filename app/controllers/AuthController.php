<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function login() {
        $error = null;
        $oldEmail = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $oldEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'] ?? '';

            if (!$oldEmail || !$password) {
                $error = 'Por favor ingresa correo y contraseña.';
            } else {
                $user = User::findByEmail($oldEmail);
                if ($user && User::verifyPassword($password, $user->passwordHash, $user->id)) {
                    session_regenerate_id(true);
                    $role = $user->typeId === 4 ? 'cliente' : 'usuario';
                    $_SESSION['auth'] = [
                        'type' => $role,
                        'id' => $user->id,
                        'name' => $user->getName(),
                        'email' => $user->email,
                    ];

                    if ($role === 'cliente') {
                        header('Location: ' . route('home'));
                    } else {
                        header('Location: ' . route('admin'));
                    }
                    exit;
                }

                $error = 'Credenciales no válidas. Verifica tu correo y contraseña.';
            }
        }

        view('auth/login.php', ['error' => $error, 'oldEmail' => $oldEmail]);
    }

    public function register() {
        $error = null;
        $old = [
            'name' => '',
            'email' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $old['name'] = trim($_POST['name'] ?? '');
            $old['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'] ?? '';
            $passwordConfirm = $_POST['password_confirm'] ?? '';

            if (!$old['name'] || !$old['email'] || !$password || !$passwordConfirm) {
                $error = 'Todos los campos obligatorios deben completarse.';
            } elseif (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
                $error = 'Ingresa un correo válido.';
            } elseif ($password !== $passwordConfirm) {
                $error = 'Las contraseñas no coinciden.';
            } elseif (strlen($password) < 8) {
                $error = 'La contraseña debe tener al menos 8 caracteres.';
            } else {
                if (User::findByEmail($old['email'])) {
                    $error = 'Ya existe una cuenta con ese correo.';
                } else {
                    $nameParts = preg_split('/\s+/', $old['name'], 2);
                    $user = User::createClient([
                        'Nombre' => $nameParts[0] ?: $old['name'],
                        'Apellidos' => $nameParts[1] ?? '',
                        'Email' => $old['email'],
                        'Contraseña' => password_hash($password, PASSWORD_DEFAULT),
                    ]);

                    session_regenerate_id(true);
                    $_SESSION['auth'] = [
                        'type' => 'cliente',
                        'id' => $user->id,
                        'name' => $user->getName(),
                        'email' => $user->email,
                    ];

                    header('Location: ' . route('home'));
                    exit;
                }
            }
        }

        view('auth/register.php', ['error' => $error, 'old' => $old]);
    }

    public function logout() {
        logout();
        header('Location: ' . route('login'));
        exit;
    }
}
