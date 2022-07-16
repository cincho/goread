<?php

declare(strict_types=1);

namespace Cincho\Reader\Domain;

use Cincho\Framework\Database\Connection;

class SubscriptionRepository
{
    public function __construct(private Connection $connection) {}

    public function findAll(): array
    {
        return [];
    }
}