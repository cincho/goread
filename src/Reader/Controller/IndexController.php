<?php

declare(strict_types=1);

namespace Cincho\Reader\Controller;

use Cincho\Framework\Http\Response;
use Cincho\Framework\Template\Engine;

class IndexController
{
    public function __construct(private Engine $engine)
    {}

    public function __invoke(): Response
    {
        $html = $this->engine->render('index.php');

        return new Response($html);
    }
}