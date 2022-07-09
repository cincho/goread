<?php

declare(strict_types=1);

namespace Cincho\Reader\Test\Unit\DependencyInjection;

use Cincho\Reader\Router\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(Router::class, new Router());
    }
}