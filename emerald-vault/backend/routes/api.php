<?php
require_once __DIR__ . '/../app/Controllers/AuthController.php';

header("Content-Type: application/json");

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Rotas de Autenticação
if ($requestMethod === 'POST' && $requestUri === '/api/auth/login') {
    $data = json_decode(file_get_contents('php://input'), true);
    $authController = new AuthController();
    echo json_encode($authController->login($data));
    exit;
}

if ($requestMethod === 'POST' && $requestUri === '/api/auth/register') {
    $data = json_decode(file_get_contents('php://input'), true);
    $authController = new AuthController();
    echo json_encode($authController->register($data));
    exit;
}

http_response_code(404);
echo json_encode(['error' => 'Endpoint not found']);
?>