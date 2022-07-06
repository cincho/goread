<?php

declare(strict_types=1);

namespace Cincho\Reader\Test;

use Cincho\Reader\App;
use PHPUnit\Framework\TestCase;

final class AppTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(App::class, new App());
    }
}