<?php

declare(strict_types=1);

namespace App\Domain\Client;

use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\Traits\ClientTrait;
// use League\OAuth2\Server\Entities\Traits\EntityTrait;

class Client implements \JsonSerializable, ClientEntityInterface
{

    // use EntityTrait;
    use ClientTrait;

    private ?int $id;

    private ?string $clientId;

    private ?string $clientSecret;

    private ?string $description;

    private ?array $grantTypes;

    private ?array $scopes;

    private ?bool $isActive;

    private ?string $createdAt;

    private ?string $updatedAt;

    public function __construct(
        ?int $id,
        ?string $clientId,
        ?string $clientSecret,
        ?string $name,
        ?string $redirectUri,
        ?array $grantTypes,
        ?array $scopes,
        ?bool $isConfidential,
        ?bool $isActive,
        ?string $createdAt,
        ?string $updatedAt
    ) {
        $this->id = $id;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->name = $name ?? '';
        $this->redirectUri = $redirectUri ?? '';
        $this->grantTypes = $grantTypes;
        $this->scopes = $scopes;
        $this->isConfidential = $isConfidential ?? false;
        $this->isActive = $isActive;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function of(
        ?string $clientId,
        ?string $clientSecret,
        ?string $name,
        ?string $redirectUri,
        ?array $grantTypes,
        ?array $scopes,
    ): self {
        return new self(
            null,
            $clientId,
            $clientSecret,
            $name,
            $redirectUri ?? '',
            $grantTypes,
            $scopes,
            true,
            true,
            null,
            null
        );
    }

    public function getIdentifier(): string
    {
        return $this->clientId ?? '';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    public function getClientSecret(): ?string
    {
        return $this->clientSecret;
    }

    public function getName(): string
    {
        return $this->name ?? '';
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getRedirectUri(): string|array
    {
        return $this->redirectUri ?? '';
    }

    public function setRedirectUri(string $redirectUri): void
    {
        $this->redirectUri = $redirectUri;
    }

    public function getGrantTypes(): ?array
    {
        return $this->grantTypes;
    }

    public function setGrantTypes(?array $grantTypes): void
    {
        $this->grantTypes = $grantTypes;
    }

    public function getScopes(): ?array
    {
        return $this->scopes;
    }

    public function setScopes(?array $scopes): void
    {
        $this->scopes = $scopes;
    }

    public function setIsConfidential(bool $isConfidential): void
    {
        $this->isConfidential = $isConfidential;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
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
