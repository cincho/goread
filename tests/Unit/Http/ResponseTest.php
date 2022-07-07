<?php

declare(strict_types=1);

namespace Cincho\Reader\Test\Unit\Http;

use Cincho\Reader\Http\Response;
use PHPUnit\Framework\TestCase;

final class ResponseTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(Response::class, new Response());
    }
}