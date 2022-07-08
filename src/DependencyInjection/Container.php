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

    public function has(string $key): bool
    {
        return isset($this->dependencies[$key]);
    }

    public function get(string $key): mixed
    {
        if (!$this->has($key)) {
           $dependency = $this->resolve($key);
           $this->set($key, $dependency);
        }

        return $this->dependencies[$key];
    }

    private function resolve(string $dependency)
    {
        if (!class_exists($dependency)) {
            throw new \Exception(sprintf('Dependency "%s" could not be resolved by the container.', $key));
        }

        $reflection = new \ReflectionClass($dependency);
        
        return $reflection->newInstance();

    }
}