<?php

namespace App\Life;

class Module
{
    /** @var Core */
    private $core;

    /** @var Parser */
    private $parser;

    public function __construct(Core $core, Parser $parser)
    {
        $this->core = $core;
        $this->parser = $parser;
    }

    public function handle(
        string $world,
        int $width,
        int $height,
        int $step,
        array $additional = []
    ): array {

        $this->core->setWorld(new World(
            $this->parser->parse($world, $width, $height),
            $width,
            $height
        ));

        return array_merge([
            'world' => $world,
            'step' => $step,
            'data' => $this->core->renderStep($step),
            'width' => $this->core->getWorld()->getWidth(),
            'height' => $this->core->getWorld()->getHeight(),
        ], $additional);
    }
}