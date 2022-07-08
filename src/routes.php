<?php

declare(strict_types=1);

use Cincho\Reader\Controller\IndexController;
use Cincho\Reader\Controller\SubscriptionController;
use Cincho\Reader\Router\Route;
use Cincho\Reader\Router\Router;

return function (Router $router) {
    $router
        ->add(new Route('/', ['GET'], [IndexController::class]))

        ->add(new Route('/api/subscriptions', ['GET'], [SubscriptionController::class, 'index']))
    ;
};