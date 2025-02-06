<?php

declare(strict_types=1);

namespace Tests\Domain\Scope;

use App\Domain\Scope\Scope;
use PHPUnit\Framework\TestCase;

class ScopeTest extends TestCase
{

    public function testCreatingNewObject()
    {
        $scope = Scope::of('user:read', 'Read user detail');

        $this->assertEmpty($scope->getIdentifier());
        $this->assertSame($scope->getName(), 'user:read');
        $this->assertSame($scope->getDescription(), 'Read user detail');
        $this->assertEmpty($scope->getCreatedAt());
    }
}
