<?php

declare(strict_types=1);

namespace Cincho\Reader\Test\Unit;

use Cincho\Framework\DependencyInjection\Container;
use PHPUnit\Framework\TestCase;

final class DependencyDefinitionsTest extends TestCase
{
    public function testRoutes(): void
    {
        $dependencies = require_once __DIR__ . '/../../../src/Reader/dependencies.php';
        $container = new Container();
        $dependencies($container);

        $this->assertInstanceOf(Container::class, $container);
    }
}