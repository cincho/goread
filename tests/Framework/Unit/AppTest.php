<?php

declare(strict_types=1);

namespace Cincho\Framework\Test\Unit;

use Cincho\Framework\App;
use Cincho\Framework\DependencyInjection\Container;
use PHPUnit\Framework\TestCase;

final class AppTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(App::class, new App());
    }

    public function testRun(): void
    {
        $app = new App();
        $app->setContainer(new Container());

        $this->assertInstanceOf(App::class, $app);
    }
}