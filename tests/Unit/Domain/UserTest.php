<?php

declare(strict_types=1);

namespace Cincho\Reader\Test\Unit\Domain;

use Cincho\Reader\Domain\User;
use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(User::class, new User());
    }
}