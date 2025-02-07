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
        $this->assertSame($scope->getName(), 'user:read');
        $this->assertSame($scope->getDescription(), 'Read user detail');
        $this->assertEmpty($scope->getCreatedAt());
    }

    public function testCreateNewObjectFromArray()
    {
        $data = [
            'identifier' => '1',
            'name' => 'user:read',
            'description' => 'Read user detail',
            'created_at' => '2025-02-07 12:28:00'
        ];

        $scope = new Scope(
            $data['identifier'],
            $data['name'],
            $data['description'],
            $data['created_at']
        );

        $this->assertSame($data['identifier'], '1');
        $this->assertSame($data['name'], 'user:read');
        $this->assertSame($data['description'], 'Read user detail');
        $this->assertSame($data['created_at'], '2025-02-07 12:28:00');
    }
}
