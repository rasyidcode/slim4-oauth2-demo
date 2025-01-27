<?php

declare(strict_types=1);

namespace App\Domain\User;

class User implements \JsonSerializable
{

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): mixed
    {
        return [];
    }
}
