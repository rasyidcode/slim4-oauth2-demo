<?php

declare(strict_types=1);

namespace App\Domain\Client;

class ClientNotFoundException extends \Exception
{
    public $message = 'The client you requested does not exist.';
}