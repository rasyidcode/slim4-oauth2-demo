<?php

declare(strict_types=1);

namespace AuthServer\Test;

class Greeter
{
    public function greet(string $name): string
    {
        return 'Hello, ' . $name . '!';
    }
}
