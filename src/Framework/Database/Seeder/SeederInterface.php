<?php

declare(strict_types=1);

namespace Cincho\Framework\Database\Seeder;

interface SeederInterface
{
    public function seed(): void;
}