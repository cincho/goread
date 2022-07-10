<?php

declare(strict_types=1);

namespace Cincho\Framework\Router;

class Route
{
    public function __construct(
        private string $uri,
        private array $methods,
        private array $handler
    ) {}

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getMethods(): array
    {
        return $this->methods;
    }

    public function getHandler(): array
    {
        return $this->handler;
    }
}