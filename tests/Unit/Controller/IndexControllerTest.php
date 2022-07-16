<?php

declare(strict_types=1);

namespace Cincho\Reader\Test\Unit\DependencyInjection;

use Cincho\Framework\Http\Response;
use Cincho\Framework\Template\Engine;
use Cincho\Reader\Controller\IndexController;
use PHPUnit\Framework\TestCase;

class IndexControllerTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $engine = $this->createMock(Engine::class);
        $this->assertInstanceOf(IndexController::class, new IndexController($engine));
    }

    public function testInvoke(): void
    {
        $engine = $this->createMock(Engine::class);
        $controller = new IndexController($engine);

        $this->assertInstanceOf(Response::class, $controller());
    }
}