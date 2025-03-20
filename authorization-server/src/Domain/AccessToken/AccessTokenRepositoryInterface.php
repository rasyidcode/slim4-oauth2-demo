<?php

declare(strict_types=1);

namespace App\Domain\AccessToken;

use League\OAuth2\Server\Repositories\AccessTokenRepositoryInterface as OAuthAccessTokenRepositoryInterface;

interface AccessTokenRepositoryInterface extends OAuthAccessTokenRepositoryInterface
{

    public function find(string $identifier): ?AccessToken;

    public function create(AccessToken $accessToken): void;

    public function delete(string $identifier): void;
}
