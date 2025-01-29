<?php

declare(strict_types=1);

namespace App\Domain\Scope;

use League\OAuth2\Server\Entities\ScopeEntityInterface;
use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\Traits\ScopeTrait;

class Scope implements ScopeEntityInterface
{

    // use EntityTrait;
    // use ScopeTrait;

    private ?int $id;

    private ?string $name;

    private ?string $description;

    private ?string $createdAt;

    public function __construct(
        ?int $id,
        ?string $name,
        ?string $description,
        ?string $createdAt
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt;
    }

    public static function of(string $name, string $description): self
    {
        return new self(null, $name, $description, null);
    }

    public function getIdentifier(): string
    {
        return (string) $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'created_at' => $this->createdAt
        ];
    }
}
