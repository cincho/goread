<?php

declare(strict_types=1);

namespace Cincho\Reader\Router;

class Route
{
    private string $uri;
    private array $methods;
    private string $handler;

    public function __construct(string $uri, array $methods, string $handler)
    {
        $this->uri = $uri;
        $this->methods = $methods;
        $this->handler = $handler;
    }

    public function handler(): string
    {
        return $this->handler;
    }
}