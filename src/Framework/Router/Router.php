<?php

declare(strict_types=1);

namespace Cincho\Framework\Router;

class Router
{
    private array $routes = [];

    public function add(Route $route): self
    {
        $this->routes[] = $route;

        return $this;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function resolve(string $uri, string $method): Route
    {
        foreach ($this->routes as $route) {
            if ($uri === $route->getUri() && in_array($method, $route->getMethods())) {
                return $route;
            }
        }

        throw new \Exception(sprintf('URI %s could not be resolveed', $uri));
    }
}