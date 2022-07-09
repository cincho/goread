<?php

declare(strict_types=1);

namespace Cincho\Reader\Test\Unit\DependencyInjection;

use Cincho\Reader\Router\Route;
use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(Route::class, new Route('/', ['GET'], [\stdClass::class]));
    }
}