<?php

namespace App\Tests\Life;

use App\Life\World;
use PHPUnit\Framework\TestCase;

class WorldTest extends TestCase
{
    public function test_World()
    {
        $data = [[0, 0], [0, 0]];

        $world = new World([], 2, 2);
        $world->setWorldArray($data);

        $this->assertEquals(2, $world->getWidth());;
        $this->assertEquals(2, $world->getHeight());;
        $this->assertEquals($data, $world->toArray());;
        $this->assertEquals("00\n00\n", $world->toString());;
    }
}