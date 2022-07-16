<?php

declare(strict_types=1);

namespace Cincho\Reader\Database\Seeder;

use Cincho\Framework\Database\Connection;
use Cincho\Framework\Database\Seeder\SeederInterface;

class UserSeeder implements SeederInterface
{
    public function __construct(private Connection $connection) {}

    public function seed(): void
    {
        $sql = 'INSERT INTO Users (username) VALUES (:username)';

        for ($i = 1; $i <= 100; $i++) {
            $stmt = $this->connection->getClient()->prepare($sql);
            $stmt->bindParam(':username', sprintf('user%s', $i), \PDO::PARAM_STR);
            $stmt->execute();
        }
    }
}