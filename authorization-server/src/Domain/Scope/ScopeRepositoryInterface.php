<?php

declare(strict_types=1);

namespace App\Domain\Scope;

use League\OAuth2\Server\Repositories\ScopeRepositoryInterface as OAuthScopeRepositoryInterface;

interface ScopeRepositoryInterface extends OAuthScopeRepositoryInterface
{
    /**
     * @return Scope[] Return an array of Scope objects
     */
    public function findAll(): array;

    public function find(string $identifier): ?Scope;

    public function create(Scope $scope): void;

    public function update(Scope $scope): void;

    public function delete(string $identifier): void;
}
