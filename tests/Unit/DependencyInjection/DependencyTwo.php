<?php

declare(strict_types=1);

namespace Cincho\Reader\Test\Unit\DependencyInjection;

class DependencyTwo
{
    public function __construct(
        private DependencyOne $dependency_one
    ) {}
}