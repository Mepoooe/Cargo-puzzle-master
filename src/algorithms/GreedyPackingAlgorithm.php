<?php

namespace mepoooe\cargoPuzzleMaster\algorithms;

use mepoooe\cargoPuzzleMaster\commands\InitContainersCommand;
use mepoooe\cargoPuzzleMaster\interfaces\PackingAlgorithmInterface;
use mepoooe\cargoPuzzleMaster\models\Box;
use mepoooe\cargoPuzzleMaster\models\Container;
use mepoooe\cargoPuzzleMaster\utils\Result;

class GreedyPackingAlgorithm implements PackingAlgorithmInterface
{
    private Result $result;


    public function __construct(protected array $boxes, protected Container $container) {}

    public function packing(): void
    {
        $boxes = $this->boxes;

        usort($boxes, function (Box $box, Box $nextBox) {
            return $nextBox->getVolume() - $box->getVolume();
        });
        
        $containers = [];

        foreach ($boxes as $box) {
            $placed = false;

            foreach ($containers as $container) {
                if ($container->canFitBox($box)) {
                    $container->addBox($box);
                    $placed = true;
                    break;
                }
            }

            if (!$placed) {
                $newContainer = $this->createContainer();
                $newContainer->addBox($box);
                $containers[] = $newContainer;
            }
        }

        $this->result = Result::ok(['filledContainers' => $containers]);
    }

    public function getResult(): Result
    {
        return $this->result;
    }

    protected function createContainer(): Container
    {
        $containerData = [
            'width' => $this->container->getWidth(),
            'height' => $this->container->getHeight(),
            'depth' => $this->container->getDepth()
        ];
        $command = InitContainersCommand::init([
            $containerData
        ]);
        $command->execute();

        return current($command->getResult()->getData());
    }
}
