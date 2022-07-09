<?php

declare(strict_types=1);

namespace Cincho\Reader\Domain;

use Cincho\Reader\Database\Connection;

class SubscriptionRepository
{
    public function __construct(Connection $connection) {}

    public function findAll(): array
    {
        return [];
    }
}