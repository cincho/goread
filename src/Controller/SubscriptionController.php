<?php

declare(strict_types=1);

namespace Cincho\Reader\Controller;

use Cincho\Framework\Http\Response;
use Cincho\Reader\Domain\SubscriptionRepository;

class SubscriptionController
{
    public function __construct(
        private SubscriptionRepository $subscription_repository
    ) {}

    public function index(): Response
    {
        return new Response('Subscriptions');
    }
}