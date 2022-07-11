<?php

declare(strict_types=1);

namespace Cincho\Framework\Database\Migration;

interface MigrationInterface
{
    public function up(): void;

    public function down(): void;
}