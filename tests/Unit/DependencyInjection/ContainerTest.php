<?php

declare(strict_types=1);

namespace Cincho\Reader\Test\Unit\DependencyInjection;

use Cincho\Reader\DependencyInjection\Container;
use Cincho\Reader\DependencyInjection\DependencyCouldNotBeResolvedException;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(Container::class, new Container());
    }

    public function testGetDefinedDependency(): void
    {
        $container = new Container();
        $container->set(DependencyOne::class, new DependencyOne());
        $container->set('dependency_one', new DependencyOne());

        $dependency = $container->get(DependencyOne::class);

        $this->assertInstanceOf(DependencyOne::class, $dependency);

        $aliased_dependency = $container->get('dependency_one');

        $this->assertInstanceOf(DependencyOne::class, $aliased_dependency);
    }

    public function testGetAutowiredDependency(): void
    {
        $container = new Container();

        $dependency = $container->get(DependencyOne::class);

        $this->assertInstanceOf(DependencyOne::class, $dependency);

        $this->expectException(DependencyCouldNotBeResolvedException::class);
        $aliased_dependency = $container->get('dependency_one');
    }

    public function testGetAutowiredDependencyWithDependencies(): void
    {
        $container = new Container();

        $dependency = $container->get(DependencyTwo::class);

        $this->assertInstanceOf(DependencyTwo::class, $dependency);
    }
}