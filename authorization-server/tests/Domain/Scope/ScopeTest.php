<?php

declare(strict_types=1);

namespace Tests\Domain\Scope;

use App\Domain\Scope\Scope;
use PHPUnit\Framework\TestCase;

class ScopeTest extends TestCase
{

    public function testCreateNewObject()
    {
        $scope = Scope::of('user:read', 'Read user detail');

        $this->assertEmpty($scope->getIdentifier());
        $this->assertSame('user:read', $scope->getName());
        $this->assertSame('Read user detail', $scope->getDescription());
        $this->assertEmpty($scope->getCreatedAt());
        $this->assertEmpty($scope->getUpdatedAt());
    }

    public function testCreateNewObjectFromArray()
    {
        $data = [
            'id' => '1',
            'name' => 'user:read',
            'description' => 'Read user detail',
            'created_at' => '2025-02-07 12:28:00',
            'updated_at' => '2025-02-08 12:28:00',
        ];

        $scope = new Scope(
            $data['id'],
            $data['name'],
            $data['description'],
            $data['created_at'],
            $data['updated_at']
        );

        $this->assertSame('1', $scope->getIdentifier());
        $this->assertSame('user:read', $scope->getName());
        $this->assertSame('Read user detail', $scope->getDescription());
        $this->assertSame('2025-02-07 12:28:00', $scope->getCreatedAt());
        $this->assertSame('2025-02-08 12:28:00', $scope->getUpdatedAt());
    }

    public function testUpdateExistingObject()
    {
        $scope = new Scope(
            '1',
            'user:read',
            'Read user detail',
            '2025-02-07 12:28:00',
            '2025-02-08 12:28:00'
        );
        $scope->setIdentifier('2');
        $scope->setName('user:write');
        $scope->setDescription('Allow to update user');
        $scope->setCreatedAt('2025-02-10 12:28:00');
        $scope->setUpdatedAt('2025-02-11 12:28:00');

        $this->assertSame('2', $scope->getIdentifier());
        $this->assertSame('user:write', $scope->getName());
        $this->assertSame('Allow to update user', $scope->getDescription());
        $this->assertSame('2025-02-10 12:28:00', $scope->getCreatedAt());
        $this->assertSame('2025-02-11 12:28:00', $scope->getUpdatedAt());
    }
}
