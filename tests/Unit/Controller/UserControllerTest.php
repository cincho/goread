<?php

declare(strict_types=1);

namespace Cincho\Reader\Test\Unit\DependencyInjection;

use Cincho\Framework\Http\Response;
use Cincho\Reader\Controller\UserController;
use Cincho\Reader\Domain\UserRepository;
use PHPUnit\Framework\TestCase;

class UserControllerTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $user_repository = $this->createMock(UserRepository::class);
        $controller = new UserController($user_repository);
        $this->assertInstanceOf(UserController::class, $controller);
    }
}