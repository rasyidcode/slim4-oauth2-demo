<?php

declare(strict_types=1);

namespace App\Domain\Client;

use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\Traits\ClientTrait;
use League\OAuth2\Server\Entities\Traits\EntityTrait;

class Client implements ClientEntityInterface
{

    use EntityTrait;
    use ClientTrait;

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setRedirectUri(string $redirectUri): void
    {
        $this->redirectUri = $redirectUri;
    }


    public function setConfidential(): void
    {
        $this->isConfidential = true;
    }
}
