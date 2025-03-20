<?php

declare(strict_types=1);

use Dotenv\Dotenv;

return function (Dotenv $dotenv) {
    $dotenv->required('ENV');
    $dotenv->ifPresent('DISPLAY_ERROR_DETAILS')->isBoolean();
    $dotenv->ifPresent('LOG_ERROR')->isBoolean();
    $dotenv->ifPresent('LOG_ERROR_DETAILS')->isBoolean();
};
