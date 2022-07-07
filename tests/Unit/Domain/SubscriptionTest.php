<?php

declare(strict_types=1);

namespace Cincho\Reader\Test\Unit\Domain;

use Cincho\Reader\Domain\Subscription;
use PHPUnit\Framework\TestCase;

final class SubscriptionTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(Subscription::class, new Subscription());
    }
}