<?php

declare(strict_types=1);

namespace Cincho\Framework\DependencyInjection;

class Container
{
    /**
     * List of dependencies.
     */
    private array $dependencies = [];

    /**
     * Set a dependency definition.
     */
    public function set(string $key, mixed $value): self
    {
        $this->dependencies[$key] = $value;

        return $this;
    }

    /**
     * Check whether the dependency is defined or not.
     */
    public function has(string $key): bool
    {
        return isset($this->dependencies[$key]);
    }

    /**
     * Get the dependency.
     */
    public function get(string $key): mixed
    {
        if (!$this->has($key)) {
           $dependency = $this->resolve($key);
           $this->set($key, $dependency);
        }

        $dependency = $this->dependencies[$key];

        if ($dependency instanceof \Closure) {
            return $dependency($this);
        }

        return $dependency;
    }

    /**
     * Resolve a dependency. This method is used when the dependency has
     * not been defined in the container.
     */
    private function resolve(string $key): mixed
    {
        if (!class_exists($key)) {
            throw new DependencyCouldNotBeResolvedException(sprintf('Dependency "%s" could not be resolved by the container.', $key));
        }

        $class = new \ReflectionClass($key);
        $constructor = $class->getConstructor();

        if (!$constructor instanceof \ReflectionMethod) {
            return $class->newInstance();
        }

        $constructor_args = [];
        $constructor_parameters = $constructor->getParameters();

        foreach ($constructor_parameters as $constructor_parameter) {
            $parameter_type = $constructor_parameter->getType()->getName();
            $constructor_args[] = $this->get($parameter_type);
        }

        return $class->newInstanceArgs($constructor_args);
    }
}