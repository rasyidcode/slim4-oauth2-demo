<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAttributes(true);
$containerBuilder->useAutowiring(true);

$container = $containerBuilder->build();
AppFactory::setContainer($container);
$app = AppFactory::create();