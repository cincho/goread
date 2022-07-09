<?php

declare(strict_types=1);

namespace Cincho\Reader\Test\Unit\DependencyInjection;

use Cincho\Reader\Controller\UserController;
use Cincho\Reader\Http\Response;
use PHPUnit\Framework\TestCase;

class UserControllerTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(UserController::class, new UserController());
    }
}