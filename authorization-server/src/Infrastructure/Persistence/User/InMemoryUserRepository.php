<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Domain\User\User;
use App\Domain\User\UserNotFoundException;
use App\Domain\User\UserRepositoryInterface;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\UserEntityInterface;

class InMemoryUserRepository implements UserRepositoryInterface
{

    /**
     * @var User[]
     */
    private array $users;

    public function __construct()
    {
        $this->users = [
            1 => new User('1', 'user1', '$2y$10$jmfp8mnlWtzckg8LIMjxq.UD7Stpl5zGMHzGGz8PnL.8O2s8MITPu'),
            2 => new User('2', 'user2', '$2y$10$jmfp8mnlWtzckg8LIMjxq.UD7Stpl5zGMHzGGz8PnL.8O2s8MITPu'),
            3 => new User('3', 'user3', '$2y$10$jmfp8mnlWtzckg8LIMjxq.UD7Stpl5zGMHzGGz8PnL.8O2s8MITPu'),
            4 => new User('4', 'user4', '$2y$10$jmfp8mnlWtzckg8LIMjxq.UD7Stpl5zGMHzGGz8PnL.8O2s8MITPu'),
            5 => new User('5', 'user5', '$2y$10$jmfp8mnlWtzckg8LIMjxq.UD7Stpl5zGMHzGGz8PnL.8O2s8MITPu'),
        ];
    }

    public function findAll(): array
    {
        return array_values($this->users);
    }

    public function find(string $identifier): User
    {
        if (!isset($this->users[$identifier])) {
            throw new UserNotFoundException();
        }

        return $this->users[$identifier];
    }

    public function create(User $user): void {}

    public function update(User $user): void {}

    public function delete(string $identifier): void {}

    public function getUserEntityByUserCredentials(
        string $username,
        string $password,
        string $grantType,
        ClientEntityInterface $client
    ): ?UserEntityInterface {
        foreach ($this->users as $user) {
            if ($user->getUsername() === $username && password_verify($password, $user->getPassword())) {
                return $user;
            }
        }

        return null;
    }
}
