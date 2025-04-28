<?php
require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../Models/User.php';

class AuthController {
    public function login($request) {
        $userModel = new User();
        $user = $userModel->findByEmail($request['email']);
        
        if (!$user || !password_verify($request['password'], $user['password'])) {
            http_response_code(401);
            return ['error' => 'Invalid credentials'];
        }

        $token = bin2hex(random_bytes(32));
        
        return [
            'token' => $token,
            'user' => [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email']
            ]
        ];
    }

    public function register($request) {
        $userModel = new User();
        
        if ($userModel->findByEmail($request['email'])) {
            http_response_code(400);
            return ['error' => 'Email already exists'];
        }

        if ($userModel->create($request)) {
            return ['success' => true];
        }

        http_response_code(500);
        return ['error' => 'Registration failed'];
    }
}
?>