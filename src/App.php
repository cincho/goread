<?php

declare(strict_types=1);

namespace Cincho\Reader;

use Cincho\Reader\DependencyInjection\Container;
use Cincho\Reader\Error\ErrorHandler;
use Cincho\Reader\Http\Request;
use Cincho\Reader\Http\Response;
use Cincho\Reader\Router\Router;

final class App
{
    private Container $container;

    public function setContainer(Container $container): void
    {
        $this->container = $container;
    }

    public function run(): void
    {
        $error_handler = new ErrorHandler();
        set_error_handler([$error_handler, 'handle']);
        $router = $this->container->get(Router::class);
        $uri = $this->container->get(Request::class)->getUri();
        $handler = $router->resolve($uri);

        $response = $handler();

        if (!$response instanceof Response) {
            throw new \Exception('A controller must return am instance of Cincho\Reader\Http\Response');
        }

        $response->emit();
    }
}