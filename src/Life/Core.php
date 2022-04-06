<?php

namespace App\Life;

class Core
{
    /** @var int */
    private const PROTECTOR_MAX_STEP = 9999;

    /** @var World */
    private $world;

    private $currentStep = 0;

    public function setWorld(World $world): void
    {
        $this->world = $world;
    }

    public function getWorld(): World
    {
        return $this->world;
    }

    public function renderStep(int $step): array
    {
        while ($this->currentStep < $step) {
            $this->calculateNextStep();
            $this->currentStep++;
            if ($this->currentStep > self::PROTECTOR_MAX_STEP) break;
        }

        return $this->world->toArray();
    }

    private function calculateNextStep(): void
    {
        $world = [];
        foreach ($this->world->toArray() as $x => $row) {
            $world[$x] = [];
            foreach ($row as $y => $cell) {
                $count = $this->countNeighbours($x, $y);

                if (1 === (int) $cell) {
                    if ($count >= 2 && $count <= 3) {
                        $cell = 1;
                    }
                    else {
                        $cell = 0;
                    }
                }
                elseif(3 === $count) {
                    $cell = 1;
                }

                $world[$x][$y] = $cell;
            }
        }

        $this->world->setWorldArray($world);
    }

    private function countNeighbours(int $x, int $y): int
    {
        $count = 0;
        $area = [
            [-1,-1], [0,-1], [1,-1],
            [-1, 0],         [1, 0],
            [-1, 1], [0, 1], [1, 1],
        ];
        $world = $this->world->toArray();

        foreach ($area as $target) {
            $cell = $world[$target[0] + $x][$target[1] + $y] ?? 0;

            if (!is_numeric($cell)) continue;

            $count += $cell;
        }

        return $count;
    }
}