<?php

declare(strict_types=1);

namespace Cincho\Framework\Error;

class ErrorHandler
{
    public function error($errno, $errstr, $errfile, $errline)
    {
        var_dump($errno, $errstr, $errfile, $errline);die();
    }

    public function exception(\Throwable $exception)
    {
        var_dump($exception);die();
    }
}