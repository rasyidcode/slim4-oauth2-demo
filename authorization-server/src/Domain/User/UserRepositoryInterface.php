<?php

declare(strict_types=1);

namespace App\Domain\User;

use League\OAuth2\Server\Repositories\UserRepositoryInterface as OAuthUserRepositoryInterface;

interface UserRepositoryInterface extends OAuthUserRepositoryInterface
{
    /**
     * @return User[] Returns an array of User objects
     */
    public function findAll(): array;

    public function find(int $id): User;

    public function create(User $user): void;

    public function update(User $user): void;

    public function delete(int $id): void;
}
