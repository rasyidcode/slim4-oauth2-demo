<?php

declare(strict_types=1);

namespace Tests\Domain\AccessToken;

use App\Domain\AccessToken\AccessToken;
use App\Domain\Client\Client;
use App\Domain\Scope\Scope;
use PHPUnit\Framework\TestCase;

class AccessTokenTest extends TestCase
{
    public function testCreateNewObject()
    {
        $scope = new Scope();
        $scope->setIdentifier('profile:read');

        $client = new Client();
        $client->setIdentifier('testclientid');
        $client->setName('Test Client');
        $client->setRedirectUri('http://test-client.test');
        $client->setConfidential();

        $accessToken = new AccessToken();
        $accessToken->setIdentifier('testtokenid');
        $accessToken->setExpiryDateTime(new \DateTimeImmutable());
        $accessToken->setClient($client);
        $accessToken->setUserIdentifier('1');
        $accessToken->addScope($scope);

        $this->assertSame('testtokenid', $accessToken->getIdentifier());
        $this->assertInstanceOf(\DateTimeImmutable::class, $accessToken->getExpiryDateTime());
        $this->assertInstanceOf(Client::class, $accessToken->getClient());
        $this->assertSame('1', $accessToken->getUserIdentifier());
        $this->assertContainsOnlyInstancesOf(Scope::class, $accessToken->getScopes());
    }
}
