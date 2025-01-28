<?php

declare(strict_types=1);

namespace App\Domain\Client;

use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\Traits\ClientTrait;
use League\OAuth2\Server\Entities\Traits\EntityTrait;

class Client implements \JsonSerializable, ClientEntityInterface
{

    use EntityTrait;
    use ClientTrait;

    private string $clientId;

    private string $clientSecret;

    private string $description;

    private string $grantTypes;

    private string $scopes;

    private bool $isActive;

    private string $createdAt;

    private string $updatedAt;

    public function __construct(
        string $identifier,
        string $clientId,
        string $clientSecret,
        string|array $redirectUri,
        string $name,
        array $grantTypes,
        array $scopes,
        bool $isActive = true,
        string $createdAt = '',
        string $updatedAt = ''
    ) {
        $this->identifier = $identifier;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUri = $redirectUri;
        $this->name = $name;
        $this->grantTypes = $grantTypes;
        $this->scopes = $scopes;
        $this->isActive = $isActive;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->identifier,
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri,
            'name' => $this->name,
            'description' => $this->description,
            'grant_types' => $this->grantTypes,
            'scopes' => $this->scopes,
            'is_confidential' => $this->isConfidential,
            'is_active' => $this->isActive,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt
        ];
    }
}
