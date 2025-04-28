<?php
class AuthMiddleware {
    public static function handle() {
        if (!isset($_SERVER['HTTP_AUTHORIZATION'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            exit;
        }

        $token = str_replace('Bearer ', '', $_SERVER['HTTP_AUTHORIZATION']);
        
        // Verificação simplificada (em produção, usar JWT)
        if (!self::validateToken($token)) {
            http_response_code(403);
            echo json_encode(['error' => 'Invalid token']);
            exit;
        }
    }

    private static function validateToken($token) {
        // Implementação real validaria no banco/Redis
        return strlen($token) === 64;
    }
}
?>