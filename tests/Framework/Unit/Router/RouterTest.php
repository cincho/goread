<?php

declare(strict_types=1);

namespace Cincho\Framework\Test\Unit\DependencyInjection;

use Cincho\Framework\Router\Route;
use Cincho\Framework\Router\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(Router::class, new Router());
    }

    public function testAdd(): void
    {
        $route1 = new Route('/', ['GET'], [\stdClass::class]);
        $route2 = new Route('/one', ['POST'], [\stdClass::class]);

        $router = new Router();
        $router->add($route1);
        $router->add($route2);

        $routes = $router->getRoutes();
        $this->assertIsArray($routes);
        $this->assertEquals($route1, $routes[0]);
        $this->assertEquals($route2, $routes[1]);
    }

    public function testRoutesResolves(): void
    {
        $route1 = new Route('/', ['GET'], [\stdClass::class]);
        $route2 = new Route('/one', ['POST'], [\stdClass::class]);

        $router = new Router();
        $router->add($route1);
        $router->add($route2);

        $route = $router->resolve('/', 'GET');

        $this->assertEquals($route1, $route);
    }

    public function testRoutesCouldNotBeResolved(): void
    {
        $route1 = new Route('/', ['GET'], [\stdClass::class]);
        $route2 = new Route('/one', ['POST'], [\stdClass::class]);

        $router = new Router();
        $router->add($route1);
        $router->add($route2);

        $this->expectException(\Exception::class);
        $route = $router->resolve('/', 'POST');
    }
}