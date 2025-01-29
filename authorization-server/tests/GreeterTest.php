<?php

declare(strict_types=1);

namespace AuthServer\Test;

use PHPUnit\Framework\TestCase;

class GreeterTest extends TestCase
{
    public function testGreetsWithName(): void
    {
        // $greeter = new Greeter;
        // $greeting = $greeter->greet('Alicee');
        $greeting = 'Hello, World';

        $this->assertSame('Hello, Alice!', $greeting);
    }
}
