<?php

declare(strict_types=1);

use Cincho\Reader\Controller\IndexController;
use Cincho\Reader\Controller\SubscriptionController;
use Cincho\Reader\Database\Connection;
use Cincho\Reader\DependencyInjection\Container;
use Cincho\Reader\Http\Request;
use Cincho\Reader\Router\Router;

return function (Container $container) {
    $container
        ->set(Connection::class, function($container) {
            $dsn = sprintf('sqlite:%s', __DIR__ . '/../../database.sqlite3');
            $pdo = new \Pdo($dsn);
            return new Connection($pdo);
        })
        ->set(Request::class, function($container) {
            return new Request($_SERVER);
        })
        ->set(Router::class, new Router())
    ;
};