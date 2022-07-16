<?php

declare(strict_types=1);

namespace Cincho\Reader\Controller;

use Cincho\Framework\Http\Response;
use Cincho\Reader\Domain\UserRepository;

class UserController
{
    public function __construct(
        private UserRepository $user_repository
    ) {}

    public function index(): Response
    {
        $users = $this->user_repository->findAll();

        return new Response(json_encode($users));
    }
}