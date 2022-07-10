<?php

declare(strict_types=1);

namespace Cincho\Framework\Http;

class Request
{
    private array $server;

    public function __construct(array $server)
    {
        $this->server = $server;
    }

    public function get(string $key): mixed
    {
        return $this->server[$key] ?? null;
    }
}