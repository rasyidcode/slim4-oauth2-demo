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
        string $id,
        string $username,
        string $password,
        string $email,
        array $roles,
        bool $isActive,
        string $createdAt,
        string $updatedAt,
    ) {
        $this->identifier = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->roles = $roles;
        $this->isActive = $isActive;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function of(
        string $username,
        string $password,
        string $email,
        array $roles = [],
        bool $isActive = true
    ): self {
        return new self(
            '',
            $username,
            $password,
            $email,
            $roles,
            $isActive,
            '',
            ''
        );
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
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

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
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
