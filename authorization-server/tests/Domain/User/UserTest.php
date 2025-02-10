<?php

declare(strict_types=1);

namespace Tests\Domain\User;

use App\Domain\User\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testCreateNewObject()
    {
        $password = password_hash('12345', PASSWORD_BCRYPT);
        $user = User::of('josh', $password, 'josh@example.com');

        $this->assertEmpty($user->getIdentifier());
        $this->assertSame('josh', $user->getUsername());
        $this->assertSame($password, $user->getPassword());
        $this->assertSame('josh@example.com', $user->getEmail());
        $this->assertSame(['ROLE_USER'], $user->getRoles());
        $this->assertTrue($user->isActive());
        $this->assertEmpty($user->getCreatedAt());
        $this->assertEmpty($user->getUpdatedAt());
    }

    public function testUpdateObject()
    {
        $user = new User(
            '1',
            'josh',
            password_hash('12345', PASSWORD_BCRYPT),
            'josh@example.com',
            ['ROLE_USER'],
            false,
            '2025-02-10 10:40:00',
            '2025-02-10 11:40:00'
        );

        $password = password_hash('secret', PASSWORD_BCRYPT);
        $user->setIdentifier('2');
        $user->setUsername('john');
        $user->setPassword($password);
        $user->setEmail('john@example.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setIsActive(true);
        $user->setCreatedAt('2025-02-11 11:44:00');
        $user->setUpdatedAt('2025-02-11 12:44:00');

        $this->assertSame('2', $user->getIdentifier());
        $this->assertSame('john', $user->getUsername());
        $this->assertSame($password, $user->getPassword());
        $this->assertSame('john@example.com', $user->getEmail());
        $this->assertSame(['ROLE_ADMIN', 'ROLE_USER'], $user->getRoles());
        $this->assertTrue($user->isActive());
        $this->assertSame('2025-02-11 11:44:00', $user->getCreatedAt());
        $this->assertSame('2025-02-11 12:44:00', $user->getUpdatedAt());
    }
}
