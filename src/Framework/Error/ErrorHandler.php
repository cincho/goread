<?php

declare(strict_types=1);

namespace Cincho\Framework\Error;

class ErrorHandler
{
    public function handle($errno, $errstr, $errfile, $errline)
    {
        var_dump($errno, $errstr, $errfile, $errline);
    }
}