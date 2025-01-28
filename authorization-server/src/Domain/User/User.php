<?php

declare(strict_types=1);

namespace App\Domain\User;

use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\UserEntityInterface;

class User implements \JsonSerializable, UserEntityInterface
{

    use EntityTrait;

    private string $username;

    private string $password;

    private string $email;

    private string $fullName;

    private array $roles;

    private bool $isActive;

    private string $createdAt;

    private string $updatedAt;

    public function __construct(
        string $identifier,
        string $username,
        string $password,
        string $email,
        array $roles = [],
        bool $isActive = true,
        string $createdAt = '',
        string $updatedAt = '',
    ) {
        $this->identifier = $identifier;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $roles[] = 'ROLE_USER';
        $this->roles = array_unique($roles);
        $this->isActive = $isActive;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
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
        return $this->roles;
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
            'id' => $this->identifier,
            'username' => $this->username,
            'email' => $this->email,
            'full_name' => $this->fullName,
            'roles' => $this->roles,
            'is_active' => $this->isActive,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}
