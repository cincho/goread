<?php

declare(strict_types=1);

namespace Cincho\Reader\Router;

class Router
{
    public function resolve(string $uri): Route
    {
        return new Route();
    }
}