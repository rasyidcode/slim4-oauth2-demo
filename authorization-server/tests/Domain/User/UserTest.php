<?php

declare(strict_types=1);

namespace Tests\Domain\User;

use App\Domain\User\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testCreateNewObject()
    {
        $user = new User('1', 'user1', 'password');

        $this->assertSame('1', $user->getIdentifier());
        $this->assertSame('user1', $user->getUsername());
        $this->assertSame('password', $user->getPassword());
    }
}
