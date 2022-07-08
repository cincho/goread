<?php

declare(strict_types=1);

namespace Cincho\Reader\Router;

class Router
{
    private array $routes = [];

    public function add(Route $route): self
    {
        $this->routes[] = $route;

        return $this;
    }

    public function resolve(string $uri): Route
    {
        foreach ($this->routes as $route) {
            if ($uri === $route->getUri()) {
                return $route;
            }
        }

        throw new \Exception(sprintf('URI %s could not be resolveed', $uri));
    }
}