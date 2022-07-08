<?php

declare(strict_types=1);

namespace Cincho\Reader\Controller;

use Cincho\Reader\Http\Response;

class SubscriptionController
{
    public function index(): Response
    {
        return new Response('Subscriptions');
    }
}