<?php

namespace App\Life;

class Parser
{
    public function parse(string $world, int $width, int $height): array
    {
        $rows = explode("\n", str_replace(' ', '', $world));
        $worldArray = [];
        foreach ($rows as $key => $row) {
            if ($key >= $width) break;
            $worldArray[] = str_split(mb_strimwidth($row, 0, $height));
        }

        return $worldArray;
    }
}