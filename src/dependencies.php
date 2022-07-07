<?php

declare(strict_types=1);

use Cincho\Reader\Controller\IndexController;
use Cincho\Reader\DependencyInjection\Container;
use Cincho\Reader\Http\Request;
use Cincho\Reader\Router\Router;

return function (Container $container) {
    $container
        ->set(Request::class, new Request($_SERVER))
        ->set(Router::class, new Router())
        ->set(IndexController::class, new IndexController())
    ;
};