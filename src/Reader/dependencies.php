<?php

declare(strict_types=1);

use Cincho\Framework\Database\Connection;
use Cincho\Framework\DependencyInjection\Container;
use Cincho\Framework\Http\Request;
use Cincho\Framework\Router\Router;
use Cincho\Reader\Controller\IndexController;
use Cincho\Reader\Controller\SubscriptionController;

return function (Container $container) {
    $container
        ->set(Connection::class, function($container) {
            $dsn = sprintf('sqlite:%s', __DIR__ . '/../../../database.sqlite3');
            $pdo = new \Pdo($dsn);
            return new Connection($pdo);
        })
        ->set(Request::class, function($container) {
            return new Request($_SERVER);
        })
        ->set(Router::class, new Router())
    ;
};