<?php

declare(strict_types=1);

namespace Cincho\Framework;

use Cincho\Framework\Command\CommandInterface;
use Cincho\Framework\DependencyInjection\Container;
use Cincho\Framework\Error\ErrorHandler;
use Cincho\Framework\Http\Request;
use Cincho\Framework\Http\Response;
use Cincho\Framework\Router\Router;

final class App
{
    private Container $container;

    public function setContainer(Container $container): void
    {
        $this->container = $container;
    }

    public function execute(string $command_name): void
    {
        $command = $this->container->get($command_name);

        if (!$command instanceof CommandInterface) {
            throw new \Exception(sprintf('Command %s not found', $command_name));
        }

        $return = $command->execute();

        exit($return);
    }

    public function run(): void
    {
        $error_handler =$this->container->get(ErrorHandler::class);
        set_error_handler([$error_handler, 'error']);
        set_exception_handler([$error_handler, 'exception']);

        $router = $this->container->get(Router::class);
        $uri = $this->container->get(Request::class)->get('REQUEST_URI');
        $method = $this->container->get(Request::class)->get('REQUEST_METHOD');

        if (!$uri) {
            exit(1);
        }

        $route = $router->resolve($uri, $method);
        $handler_definition = $route->getHandler();
        $handler = $this->container->get($handler_definition[0]);

        $response = isset($handler_definition[1]) ? $handler->{$handler_definition[1]}() : $handler();

        if (!$response instanceof Response) {
            throw new \Exception('A controller must return an instance of Cincho\Framework\Http\Response');
        }

        $response->emit();
    }
}