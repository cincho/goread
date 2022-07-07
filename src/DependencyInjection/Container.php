<?php

declare(strict_types=1);

namespace Cincho\Reader\DependencyInjection;

class Container
{
    private array $dependencies = [];

    public function set(string $key, mixed $value): self
    {
        $this->dependencies[$key] = $value;

        return $this;
    }

    public function get(string $key): mixed
    {
        if (!isset($this->dependencies[$key])) {
            throw new \Exception(sprintf('Dependency "%s" could not be resolved by the container.', $key));
        }

        return $this->dependencies[$key];
    }
}