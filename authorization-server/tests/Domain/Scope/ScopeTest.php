<?php

declare(strict_types=1);

namespace Tests\Domain\Scope;

use App\Domain\Scope\Scope;
use PHPUnit\Framework\TestCase;

class ScopeTest extends TestCase
{

    public function testCreateNewObject()
    {
        $scope = new Scope();
        $scope->setIdentifier('profile:read');

        $this->assertSame('profile:read', $scope->getIdentifier());
    }
}
