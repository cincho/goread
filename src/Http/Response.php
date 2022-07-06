<?php

declare(strict_types=1);

namespace Cincho\Reader\Http;

class Response
{
    private ?string $body = null;

    public function __construct(?string $body = null)
    {
        $this->body = $body;
    }

    public function emit(): void
    {
        echo $this->body;
    }
}