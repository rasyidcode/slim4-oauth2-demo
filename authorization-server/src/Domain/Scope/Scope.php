<?php

declare(strict_types=1);

namespace App\Domain\Scope;

use League\OAuth2\Server\Entities\ScopeEntityInterface;
use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\Traits\ScopeTrait;

class Scope implements ScopeEntityInterface
{

    use EntityTrait;
    use ScopeTrait;

    public function jsonSerialize(): string
    {
        return $this->identifier;
    }
}
