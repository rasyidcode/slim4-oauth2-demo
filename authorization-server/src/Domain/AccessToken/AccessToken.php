<?php

declare(strict_types=1);

namespace App\Domain\AccessToken;

use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use League\OAuth2\Server\Entities\ScopeEntityInterface;
use League\OAuth2\Server\Entities\Traits\AccessTokenTrait;
use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\Traits\TokenEntityTrait;

class AccessToken implements AccessTokenEntityInterface
{

    use EntityTrait;
    use TokenEntityTrait;
    use AccessTokenTrait;

    // identifier

    // scopes

    // client

    // expiryDateTime

    // userIdentifier

    public function addScope(ScopeEntityInterface $scope): void
    {
        $this->scopes[$scope->getName()] = $scope;
    }

}