<?php

declare(strict_types=1);

namespace App\Domain\Client;

use League\OAuth2\Server\Repositories\ClientRepositoryInterface as OAuthClientRepositoryInterface;

interface ClientRepositoryInterface extends OAuthClientRepositoryInterface
{
    /**
     * @return Client[] Returns an array of Client objects
     */
    public function findAll(): array;

    public function find(string $id): ?Client;

    public function findByClientId(string $clientId): ?Client;

    public function create(Client $client): void;

    public function update(Client $client): void;

    public function delete(string $id): void;
}
