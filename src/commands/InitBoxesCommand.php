<?php

namespace mepoooe\cargoPuzzleMaster\commands;

use mepoooe\cargoPuzzleMaster\commands\helpers\CommandHelper;
use mepoooe\cargoPuzzleMaster\utils\Result;
use mepoooe\cargoPuzzleMaster\interfaces\CommandInterface;
use mepoooe\cargoPuzzleMaster\models\Box;

class InitBoxesCommand implements CommandInterface
{
    use CommandHelper;

    protected Result $result;


    public static function init (array $boxes): self
    {
        return new self($boxes);
    }

    public function __construct(private array $boxes)
    {}

    public function execute(): void
    {
        $initedBoxes = [];

        foreach ($this->boxes as $box) {
            $initedBoxes[] = Box::init($box['width'], $box['height'], $box['depth']);
        }

        $this->result = Result::ok($initedBoxes);
    }
}