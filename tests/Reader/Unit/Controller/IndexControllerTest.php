<?php

declare(strict_types=1);

namespace Cincho\Reader\Test\Unit\DependencyInjection;

use Cincho\Framework\Http\Response;
use Cincho\Reader\Controller\IndexController;
use PHPUnit\Framework\TestCase;

class IndexControllerTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(IndexController::class, new IndexController());
    }

    public function testInvoke(): void
    {
        $controller = new IndexController();

        $this->assertInstanceOf(Response::class, $controller());
    }
}