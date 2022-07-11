<?php

declare(strict_types=1);

namespace Cincho\Reader\Database\Migration;

use Cincho\Framework\Database\Connection;
use Cincho\Framework\Database\Migration\MigrationInterface;

class Migration20220711000000 implements MigrationInterface
{
    public function __construct(private Connection $connection) {}

    public function up(): void
    {
        $sql = <<<SQL
            CREATE TABLE IF NOT EXISTS Users (
                id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT
            )
        SQL;

        $this->connection->getClient()->query($sql);
    }

    public function down(): void
    {
        $sql = <<<SQL
            DROP TABLE IF EXISTS Users
        SQL;

        $this->connection->getClient()->query($sql);
    }
}