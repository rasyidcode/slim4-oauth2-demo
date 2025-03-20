<?php

declare(strict_types=1);

namespace Tests\Domain\Client;

use App\Domain\Client\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{

    public function testCreateNewObject()
    {
        $client = new Client();
        $client->setIdentifier('testclientid');
        $client->setName('Test Client');
        $client->setRedirectUri('http://test-client.test');
        $client->setConfidential();

        $this->assertSame('testclientid', $client->getIdentifier());
        $this->assertSame('Test Client', $client->getName());
        $this->assertSame('http://test-client.test', $client->getRedirectUri());
        $this->assertTrue($client->isConfidential());
    }
}
