<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Cincho\Framework\App;
use Cincho\Framework\DependencyInjection\Container;
use Cincho\Framework\Router\Router;

// Create container.
$container = new Container();

// Configure dependencies.
$dependencies = require_once __DIR__ . '/dependencies.php';
$dependencies($container);

// Configure routes.
$routes = require_once __DIR__ . '/routes.php';
$routes($container->get(Router::class));

// Run application.
$app = new App();
$app->setContainer($container);
$app->run();