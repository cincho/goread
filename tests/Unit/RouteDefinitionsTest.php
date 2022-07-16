<?php

declare(strict_types=1);

namespace Cincho\Reader\Test\Unit;

use Cincho\Framework\Router\Router;
use PHPUnit\Framework\TestCase;

final class RouteDefinitionsTest extends TestCase
{
    public function testRoutes(): void
    {
        $routes = require_once __DIR__ . '/../../../src/Reader/routes.php';
        $router = new Router();
        $routes($router);

        $this->assertInstanceOf(Router::class, $router);
    }
}