<?php

declare(strict_types=1);

namespace Cincho\Reader;

use Cincho\Reader\Http\Response;

final class App
{
    public function run(): void
    {
        $controller = new \Cincho\Reader\Controller\IndexController();
        $response = $controller();

        if (!$response instanceof Response) {
            throw new \Exception('A controller must return am instance of Cincho\Reader\Http\Response');
        }

        $response->emit();
    }
}