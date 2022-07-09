<?php

declare(strict_types=1);

namespace Cincho\Reader\Database;

class Connection
{
    public function __construct(private \Pdo $pdo) {}
}