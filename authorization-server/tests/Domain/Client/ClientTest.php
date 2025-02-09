<?php

declare(strict_types=1);

namespace Tests\Domain\Client;

use App\Domain\Client\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{

    public function testCreateNewObject()
    {
        $client = Client::of(
            'testId',
            'testSecret',
            'http://new-client.test',
            'New Client',
            ['client_credentials'],
            ['user:manage', 'product:read'],
            true
        );

        $this->assertSame('testId', $client->getIdentifier());
        $this->assertNull($client->getId());
        $this->assertSame('testId', $client->getClientId());
        $this->assertSame('testSecret', $client->getClientSecret());
        $this->assertSame('http://new-client.test', $client->getRedirectUri());
        $this->assertSame('New Client', $client->getName());
        $this->assertSame(['client_credentials'], $client->getGrantTypes());
        $this->assertSame(['user:manage', 'product:read'], $client->getScopes());
        $this->assertSame(true, $client->isConfidential());
        $this->assertSame(true, $client->isActive());
        $this->assertSame(null, $client->getCreatedAt());
        $this->assertSame(null, $client->getUpdatedAt());
    }

    public function testUpdateObject()
    {
        $client = new Client(
            1,
            'testId',
            'testSecret',
            'http://new-client.test',
            'New Client',
            ['client_credentials'],
            ['user:manage', 'product:read'],
            true,
            true,
            '2025-02-09 09:58:00',
            '2025-02-09 09:58:00'
        );

        $client->setRedirectUri('http://test-client2.test');
        $client->setName('Test Client 2');
        $client->setGrantTypes(['client_credentials', 'authorization_code']);
        $client->setScopes(['user:read', 'product:read']);
        $client->setIsConfidential(false);
        $client->setIsActive(false);

        $this->assertSame('http://test-client2.test', $client->getRedirectUri());
        $this->assertSame('Test Client 2', $client->getName());
        $this->assertSame(['client_credentials', 'authorization_code'], $client->getGrantTypes());
        $this->assertSame(['user:read', 'product:read'], $client->getScopes());
        $this->assertFalse($client->isConfidential());
        $this->assertFalse($client->isActive());
    }
}
