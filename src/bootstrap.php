<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Cincho\Reader\App;
use Cincho\Reader\DependencyInjection\Container;

$app = new App();
$app->setContainer(new Container());
$app->run();