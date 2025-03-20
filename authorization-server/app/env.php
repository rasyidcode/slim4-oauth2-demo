<?php

declare(strict_types=1);

use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Global Settings Object
    $containerBuilder->addDefinitions([
        'env' => DI\env('ENV', 'production'),
        'displayErrorDetails' => DI\env('DISPLAY_ERROR_DETAILS', false), // Should be set to false in production
        'logError' => DI\env('LOG_ERROR', false),
        'logErrorDetails' => DI\env('LOG_ERROR_DETAILS', false),
    ]);
};
