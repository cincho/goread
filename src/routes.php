<?php

declare(strict_types=1);

use Cincho\Framework\Router\Route;
use Cincho\Framework\Router\Router;
use Cincho\Reader\Controller\IndexController;
use Cincho\Reader\Controller\SubscriptionController;
use Cincho\Reader\Controller\UserController;

return function (Router $router) {
    $router
        ->add(new Route('/', ['GET'], [IndexController::class]))

        ->add(new Route('/api/subscriptions', ['GET'], [SubscriptionController::class, 'index']))
        ->add(new Route('/api/users', ['GET'], [UserController::class, 'index']))
    ;
};