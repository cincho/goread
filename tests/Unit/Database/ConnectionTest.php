<?php

declare(strict_types=1);

namespace Cincho\Reader\Test\Unit\Database;

use Cincho\Reader\Database\Connection;
use PHPUnit\Framework\TestCase;

class ConnectionTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $pdo = new \PDO('sqlite::memory:');
        $this->assertInstanceOf(Connection::class, new Connection($pdo));
    }
}