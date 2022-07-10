<?php

declare(strict_types=1);

namespace Cincho\Framework\Test\Unit\DependencyInjection;

use Cincho\Framework\Router\Route;
use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $route = new Route('/', ['GET'], [\stdClass::class]);

        $this->assertInstanceOf(Route::class, $route);
    }

    public function testGetMethods(): void
    {
        $route = new Route('/', ['GET'], [\stdClass::class]);

        $this->assertInstanceOf(Route::class, $route);
        $this->assertEquals(['GET'], $route->getMethods());
    }

    public function testGetUri(): void
    {
        $route = new Route('/', ['GET'], [\stdClass::class]);

        $this->assertInstanceOf(Route::class, $route);
        $this->assertEquals('/', $route->getUri());
    }

    public function testGetHandler(): void
    {
        $route = new Route('/', ['GET'], [\stdClass::class]);

        $this->assertInstanceOf(Route::class, $route);
        $this->assertEquals([\stdClass::class], $route->getHandler());
    }
}