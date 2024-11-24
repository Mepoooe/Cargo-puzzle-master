<?php

namespace mepoooe\cargoPuzzleMaster\commands;

use mepoooe\cargoPuzzleMaster\commands\helpers\CommandHelper;
use mepoooe\cargoPuzzleMaster\interfaces\CommandInterface;
use mepoooe\cargoPuzzleMaster\models\Container;
use mepoooe\cargoPuzzleMaster\utils\Result;

class InitContainersCommand implements CommandInterface
{
    use CommandHelper;

    protected Result $result;


    public static function init(array $containers): self
    {
        return new self($containers);
    }

    public function __construct(private array $containers) {}

    public function execute(): void
    {
        $initedContainers = [];

        foreach ($this->containers as $container) {
            $initedContainers[] = Container::init(
                Container::SEA_CONTAINER_TYPE_ID, 
                $container['width'], 
                $container['height'], 
                $container['depth']);
        }

        $this->result = Result::ok($initedContainers);
    }
}
