<?php

namespace App\Tests\Life;

use App\Life\Parser;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    public function test_parse()
    {
        $world = new Parser();

        $this->assertEquals(
            [
                [0, 0, 0],
                [0, 0, 0],
                [0, 0, 0],
            ],
            $world->parse("000\n000\n000", 3, 3)
        );
    }
}