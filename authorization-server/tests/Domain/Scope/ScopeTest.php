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

        $this->assertNull($scope->getId());
        $this->assertNotEmpty($scope->getIdentifier());
        $this->assertSame('user:read', $scope->getName());
        $this->assertSame('Read user detail', $scope->getDescription());
        $this->assertNull($scope->getCreatedAt());
    }

    public function testCreateNewObjectFromArray()
    {
        $data = [
            'id' => 1,
            'name' => 'user:read',
            'description' => 'Read user detail',
            'created_at' => '2025-02-07 12:28:00'
        ];

        $scope = new Scope(
            $data['id'],
            $data['name'],
            $data['description'],
            $data['created_at']
        );

        $this->assertSame(1, $scope->getId());
        $this->assertNotEmpty($scope->getIdentifier());
        $this->assertSame('user:read', $scope->getName());
        $this->assertSame('Read user detail', $scope->getDescription());
        $this->assertSame('2025-02-07 12:28:00', $scope->getCreatedAt());
    }

    public function testUpdateExistingObject()
    {
        $scope = new Scope(1, 'user:read', 'Read user detail', '2025-02-07 12:28:00');
        $scope->setName('user:write');
        $scope->setDescription('Allow to update user');

        $this->assertSame('user:write', $scope->getName());
        $this->assertSame('Allow to update user', $scope->getDescription());
    }
}
