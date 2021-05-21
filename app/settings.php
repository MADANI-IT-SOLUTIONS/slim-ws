<?php
declare(strict_types=1);
use Monolog\Logger;

return [
    'displayErrorDetails' => true, // Should be set to false in production
    'logError'            => true,
    'logErrorDetails'     => true,
    'logger' => [
        'name' => 'slim-ws',
        'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
        'level' => Logger::DEBUG,
    ],
    'db' => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'demo_migration',
        'username' => 'root',
        'password' => '',
        'collation' => 'utf8_general_ci',
        'charset' => 'utf8mb4',
        'prefix' => '',
        'flags' => [
            // Turn off persistent connections
            PDO::ATTR_PERSISTENT => false,
            // Enable exceptions
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // Emulate prepared statements
            PDO::ATTR_EMULATE_PREPARES => true,
            // Set default fetch mode to array
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // Set character set
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
        ],
    ],
];
