<?php
declare(strict_types=1);

// Configurações iniciais
require __DIR__ . '/../../config/bootstrap.php';

// Autoload de classes
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../app/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

// Headers de segurança
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");
header("Content-Security-Policy: default-src 'self'");

// Rotas principais
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Rotas da API
if (str_starts_with($requestPath, '/api')) {
    require __DIR__ . '/../../routes/api.php';
    exit;
}

// Rota do frontend (Single Page Application)
if ($requestMethod === 'GET' && !str_contains($requestPath, '.')) {
    // Verifica autenticação para rotas protegidas
    if (!in_array($requestPath, ['/login', '/register', '/password-reset'])) {
        require __DIR__ . '/../app/Middleware/AuthMiddleware.php';
        AuthMiddleware::handle();
    }
    
    // Serve o frontend
    readfile(__DIR__ . '/../../../frontend/index.html');
    exit;
}

// Arquivos estáticos (CSS, JS, imagens)
if (file_exists(__DIR__ . '/../../../frontend' . $requestPath)) {
    $mimeTypes = [
        'css' => 'text/css',
        'js' => 'application/javascript',
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'svg' => 'image/svg+xml'
    ];
    
    $extension = pathinfo($requestPath, PATHINFO_EXTENSION);
    if (array_key_exists($extension, $mimeTypes)) {
        header('Content-Type: ' . $mimeTypes[$extension]);
    }
    
    readfile(__DIR__ . '/../../../frontend' . $requestPath);
    exit;
}

// Página não encontrada
http_response_code(404);
header('Content-Type: application/json');
echo json_encode(['error' => 'Endpoint not found']);