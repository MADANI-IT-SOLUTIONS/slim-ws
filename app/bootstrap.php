<?php

use Slim\App;
use DI\ContainerBuilder;

require_once __DIR__.'/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__.'/container.php');

$container = $containerBuilder->build();

// Create App Instance
$app = $container->get(App::class);


// Register routes
(require __DIR__ . '/routes.php')($app);

// Register middleware
(require __DIR__ . '/middleware.php')($app);

return $app;
