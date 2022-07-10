<?php

declare(strict_types=1);

namespace Cincho\Framework\Test\Unit\DependencyInjection;

class DependencyTwo
{
    public function __construct(
        private DependencyOne $dependency_one
    ) {}
}