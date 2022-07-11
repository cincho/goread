<?php

declare(strict_types=1);

namespace Cincho\Framework\Database;

class Connection
{
    public function __construct(private \Pdo $pdo) {}

    public function getClient(): \Pdo
    {
        return $this->pdo;
    }
}