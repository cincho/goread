<?php

declare(strict_types=1);

namespace Cincho\Reader\Test\Unit\DependencyInjection;

use Cincho\Framework\Http\Response;
use Cincho\Reader\Controller\UserController;
use PHPUnit\Framework\TestCase;

class UserControllerTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(UserController::class, new UserController());
    }
}