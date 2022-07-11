<?php

declare(strict_types=1);

namespace Cincho\Framework\Command;

interface CommandInterface
{
    public const EXIT_SUCCESS = 0;
    public const EXIT_FAILURE = 1;

    public function execute(): int;
}