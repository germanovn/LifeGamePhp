<?php

namespace App\Life;

class World
{
    /** @var array  */
    private $worldArray;

    /** @var int  */
    private $width;

    /** @var int  */
    private $height;

    public function __construct(array $worldArray, int $width = 16, int $height = 16)
    {
        $this->width = $width;
        $this->height = $height;
        $this->worldArray = $worldArray;
    }

    public function setWorldArray(array $worldArray): self
    {
        $this->worldArray = $worldArray;
        return $this;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function toString(): string
    {
        $worldToString = '';
        foreach ($this->worldArray as $row) {
            $worldToString .= implode('', $row) . "\n";
        }

        return $worldToString;
    }

    public function toArray(): array
    {
        return $this->worldArray;
    }
}