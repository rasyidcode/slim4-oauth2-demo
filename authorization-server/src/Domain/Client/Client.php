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

    private string|array $grantTypes;

    private string|array $scopes;

    private bool $isActive;

    private string $createdAt;

    private string $updatedAt;

    public function __construct(
        string $identifier,
        string $clientId,
        string $clientSecret,
        string $name,
        string $redirectUri,
        string|array $grantTypes,
        string|array $scopes,
        bool $isConfidential,
        bool $isActive,
        string $createdAt,
        string $updatedAt
    ) {
        $this->identifier = $identifier;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->name = $name;
        $this->redirectUri = $redirectUri;
        $this->grantTypes = $grantTypes;
        $this->scopes = $scopes;
        $this->isConfidential = $isConfidential;
        $this->isActive = $isActive;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function of(
        string $clientId,
        string $clientSecret,
        string $name,
        string|array $redirectUri,
        string|array $grantTypes,
        string|array $scopes,
    ): self {
        return new self(
            '',
            $clientId,
            $clientSecret,
            $name,
            $redirectUri,
            $grantTypes,
            $scopes,
            true,
            true,
            '',
            ''
        );
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setRedirectUri(string|array $redirectUri): void
    {
        $this->redirectUri = $redirectUri;
    }

    public function getGrantTypes(): string|array
    {
        return $this->grantTypes;
    }

    public function setGrantTypes(string|array $grantTypes): void
    {
        $this->grantTypes = $grantTypes;
    }

    public function getScopes(): string|array
    {
        return $this->scopes;
    }

    public function setScopes(string|array $scopes): void
    {
        $this->scopes = $scopes;
    }

    public function setIsConfidential(bool $isConfidential): void
    {
        $this->isConfidential = $isConfidential;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'identifier' => $this->identifier,
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
