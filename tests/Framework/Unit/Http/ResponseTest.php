<?php

declare(strict_types=1);

namespace Cincho\Framework\Test\Unit\Http;

use Cincho\Framework\Http\Response;
use PHPUnit\Framework\TestCase;

final class ResponseTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(Response::class, new Response());
    }
}