<?php

declare(strict_types=1);

namespace Cincho\Framework\Test\Unit\Http;

use Cincho\Framework\Http\Request;
use PHPUnit\Framework\TestCase;

final class RequestTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(Request::class, new Request([]));
    }
}