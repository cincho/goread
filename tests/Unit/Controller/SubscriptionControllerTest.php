<?php

declare(strict_types=1);

namespace Cincho\Reader\Test\Unit\DependencyInjection;

use Cincho\Reader\Controller\SubscriptionController;
use Cincho\Reader\Domain\SubscriptionRepository;
use Cincho\Reader\Http\Response;
use PHPUnit\Framework\TestCase;

class SubscriptionControllerTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $subscription_repository = $this->createMock(SubscriptionRepository::class);
        $controller = new SubscriptionController($subscription_repository);
        $this->assertInstanceOf(SubscriptionController::class, $controller);
    }

    public function testInvoke(): void
    {
        $subscription_repository = $this->createMock(SubscriptionRepository::class);
        $controller = new SubscriptionController($subscription_repository);

        $this->assertInstanceOf(Response::class, $controller->index());
    }
}