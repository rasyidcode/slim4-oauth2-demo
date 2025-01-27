<?php

declare(strict_types=1);

namespace App\Domain\User;

use App\Domain\DomainException\DomainRecordAlreadyExistException;

class UserAlreadyExistException extends DomainRecordAlreadyExistException
{
    public $message = 'User already exist';
}
