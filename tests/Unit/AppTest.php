<?php

declare(strict_types=1);

namespace Cincho\Reader\Test\Unit;

use Cincho\Reader\App;
use Cincho\Reader\DependencyInjection\Container;
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
        $app->run();

        $this->assertInstanceOf(App::class, $app);
    }
}