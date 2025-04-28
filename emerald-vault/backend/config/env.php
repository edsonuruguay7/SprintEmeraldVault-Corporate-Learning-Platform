<?php
// Configurações de ambiente
$env = parse_ini_file(__DIR__ . '/.env');

// Banco de dados
define('DB_HOST', $env['DB_HOST'] ?? 'localhost');
define('DB_NAME', $env['DB_NAME'] ?? 'emerald_vault');
define('DB_USER', $env['DB_USER'] ?? 'root');
define('DB_PASS', $env['DB_PASS'] ?? '');

// Configurações JWT
define('JWT_SECRET', $env['JWT_SECRET'] ?? 'your-secret-key');
define('JWT_ALGORITHM', $env['JWT_ALGORITHM'] ?? 'HS256');

// Configurações de aplicação
define('APP_ENV', $env['APP_ENV'] ?? 'production');
define('APP_DEBUG', $env['APP_DEBUG'] ?? false);