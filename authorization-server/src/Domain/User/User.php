<?php

declare(strict_types=1);

namespace App\Domain\User;

use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\UserEntityInterface;

class User implements UserEntityInterface
{
    use EntityTrait;

    private string $username;

    private string $password;

    public function __construct(
        string $identifier,
        string $username,
        string $password
    ) {
        $this->identifier = $identifier;
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
