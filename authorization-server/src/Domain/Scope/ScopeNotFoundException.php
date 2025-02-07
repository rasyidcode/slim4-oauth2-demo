<?php

declare(strict_types=1);

namespace App\Domain\Scope;

final class ScopeNotFoundException extends \Exception
{
    public $message = 'The scope you requested does not exist.';
}