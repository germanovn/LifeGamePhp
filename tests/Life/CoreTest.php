<?php

namespace App\Tests\Life;

use App\Life\Core;
use App\Life\World;
use PHPUnit\Framework\TestCase;

class CoreTest extends TestCase
{
    public function test_Core()
    {
        // Arrange
        $core = new Core();
        $data = [[0,0], [0,0]];
        $world = new World($data);

        // Act
        $core->setWorld($world);

        // Assert
        $this->assertEquals($world, $core->getWorld());
        $this->assertEquals($data, $core->renderStep(0));
    }

    /**
     * @dataProvider data_renderStep
     * @param array $world
     * @param int $step
     * @param array $expected
     * @return void
     */
    public function test_renderStep(array $world, int $step, array $expected): void
    {
        // Arrange
        $core = new Core();

        // Act
        $core->setWorld(new World($world));

        // Assert
        $this->assertEquals($expected, $core->renderStep($step));
    }

    public function data_renderStep(): array
    {
        return [
            [
                [
                    [0,1,0],
                    [0,1,0],
                    [0,1,0],
                ],
                1,
                [
                    [0,0,0],
                    [1,1,1],
                    [0,0,0],
                ]
            ],
            [
                [
                    [0,1,0],
                    [0,1,0],
                    [0,1,0],
                ],
                2,
                [
                    [0,1,0],
                    [0,1,0],
                    [0,1,0],
                ],
            ],
            [
                [
                    [0,1,0,0],
                    [0,0,1,0],
                    [1,1,1,0],
                    [0,0,0,0],
                ],
                4,
                [
                    [0,0,0,0],
                    [0,0,1,0],
                    [0,0,0,1],
                    [0,1,1,1],
                ],
            ],
        ];
    }
}
