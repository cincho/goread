<?php

declare(strict_types=1);

namespace Cincho\Reader\Router;

use Cincho\Reader\Controller\IndexController;

class Route
{
    public function handler(): string
    {
        return Cincho\Reader\Controller\IndexController::class;
    }
}