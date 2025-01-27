<?php

declare(strict_types=1);

namespace App\Domain\User;

use League\OAuth2\Server\Entities\UserEntityInterface;

class User implements \JsonSerializable, UserEntityInterface
{

    public function __construct(
        private ?string $id,
        private ?string $username,
        private ?string $password,
        private ?string $email,
        private ?string $fullName,
        private ?array $roles,
        private ?bool $isActive,
        private ?string $createdAt,
        private ?string $updatedAt,
    ) {}

    public function getIdentifier(): string
    {
        return $this->id;
    }

    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setFullName(?string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setRoles(?array $roles): void
    {
        $this->roles = $roles;
    }

    public function setIsActive(?bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function getRoles(): ?array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'roles' => $this->roles,
            'is_active' => $this->isActive,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}
