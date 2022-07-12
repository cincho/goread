<?php

declare(strict_types=1);

namespace Cincho\Reader\Domain;

use Cincho\Framework\Database\Connection;
use Cincho\Reader\Domain\User;

class UserRepository
{
    public function __construct(private Connection $connection) {}

    public function findAll(): array
    {
        $sql = 'SELECT * FROM Users';
        $stmt = $this->connection->getClient()->prepare($sql);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, User::class);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}