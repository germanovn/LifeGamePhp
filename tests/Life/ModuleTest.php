<?php

namespace App\Tests\Life;

use App\Life\Core;
use App\Life\Module;
use App\Life\Parser;
use PHPUnit\Framework\TestCase;

class ModuleTest extends TestCase
{
    public function test_handle()
    {
        $parser = $this->getMockBuilder(Parser::class)
            ->onlyMethods(['parse'])
            ->getMock();

        $parser->expects($this->once())
            ->method('parse');

        $core = $this->getMockBuilder(Core::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['setWorld', 'getWorld', 'renderStep'])
            ->getMock();

        $core->expects($this->once())
            ->method('setWorld');

        $core->expects($this->exactly(2))
            ->method('getWorld');

        $core->expects($this->once())
            ->method('renderStep');

        $module = new Module($core, $parser);
        $module->handle('', 0, 0, 0);
    }
}