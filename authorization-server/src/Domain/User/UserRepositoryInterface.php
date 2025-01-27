<?php

declare(strict_types=1);

namespace App\Domain\User;

use League\OAuth2\Server\Repositories\UserRepositoryInterface as OAuthUserRepositoryInterface;

interface UserRepositoryInterface extends OAuthUserRepositoryInterface {}
