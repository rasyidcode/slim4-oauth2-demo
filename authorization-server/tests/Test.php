<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{

    public function test_is_numeric()
    {
        $this->assertTrue(is_numeric(null), 'null is numeric');
        $this->assertTrue(is_numeric('11'), '\'11\' is numeric');
        $this->assertTrue(is_numeric(11), '11 is numeric');
    }

    public function test_is_string()
    {
        $this->assertTrue(is_string('23'), '23 is string');
        $this->assertTrue(is_string(23), '23 is string');
    }

    public function test_config()
    {
        $config = [];
        $this->assertNull($config['test']);
    }

}