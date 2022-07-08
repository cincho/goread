<?php

declare(strict_types=1);

namespace Cincho\Reader\Router;

class Route
{
    private string $uri;
    private array $methods;
    private array $handler;

    public function __construct(string $uri, array $methods, array $handler)
    {
        $this->uri = $uri;
        $this->methods = $methods;
        $this->handler = $handler;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getHandler(): array
    {
        return $this->handler;
    }
}