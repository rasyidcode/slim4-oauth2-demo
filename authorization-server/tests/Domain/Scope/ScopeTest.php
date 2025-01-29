<?php

declare(strict_types=1);

namespace Tests\Domain\Scope;

use App\Domain\Scope\Scope;
use PHPUnit\Framework\TestCase;

class ScopeTest extends TestCase
{

    public function hello() {
        $this->assertEquals(1, 1);
    }

    public function hello_test()
    {
        $scope = Scope::of('user:read', 'Read user detail');

        $this->assertNull($scope->getIdentifier());
        $this->assertSame($scope->getName(), 'user:read');
        $this->assertSame($scope->getDescription(), 'Read user detail');
        $this->assertNull($scope->getCreatedAt());
    }
}
