<?php

namespace mepoooe\cargoPuzzleMaster;

use mepoooe\cargoPuzzleMaster\algorithms\GreedyPackingAlgorithm;
use mepoooe\cargoPuzzleMaster\commands\InitBoxesCommand;
use mepoooe\cargoPuzzleMaster\commands\InitContainersCommand;
use mepoooe\cargoPuzzleMaster\commands\PackingCommand;
use mepoooe\cargoPuzzleMaster\models\Box;
use mepoooe\cargoPuzzleMaster\models\Container;
use mepoooe\cargoPuzzleMaster\services\PackingService;

class Demo
{
    public function __construct()
    {
        echo "\n";
        echo "====================";
        echo "\n";
    }

    public function transportOne()
    {
        echo "\n";

        echo "transport one method is called";

        $boxLits = $this->makeBoxes(
            78,
            79,
            93,
            27
        );
        $container40ftStandardDryContainer = $this->make40ftStandardDryContainer();
        $container10ftStandardDryContainer = $this->make10ftStandardDryContainer();

        $this->writeInfoAboutBox($boxLits[0], count($boxLits));

        $resultData = $this->runPacking($boxLits, $container40ftStandardDryContainer)->getData();
        echo "Count of 40ft Standard Dry Containers: " . $resultData['countContainers'] . "\n";

        $container10ftStandardDryContainer = $this->make10ftStandardDryContainer();
        $resultData = $this->runPacking($boxLits, $container10ftStandardDryContainer)->getData();

        echo "Count of 10ft Standard Dry Containers: " . $resultData['countContainers'];
        echo "\n";
        echo "End of transportOne method";
        echo "\n";
    }

    public function transportTwo()
    {
        echo "\n";
        echo "transport two method is called";

        $boxLitsOne = $this->makeBoxes(
            30,
            60,
            90,
            24
        );
        $boxLitsTwo = $this->makeBoxes(
            75,
            100,
            200,
            33
        );
        $boxLits = array_merge($boxLitsOne, $boxLitsTwo);

        $container40ftStandardDryContainer = $this->make40ftStandardDryContainer();
        $container10ftStandardDryContainer = $this->make10ftStandardDryContainer();

        $this->writeInfoAboutBox($boxLitsOne[0], count($boxLitsOne));
        $this->writeInfoAboutBox($boxLitsTwo[0], count($boxLitsTwo));

        echo "\n";
        $resultData = $this->runPacking($boxLits, $container40ftStandardDryContainer)->getData();
        echo "Count of 40ft Standard Dry Containers: " . $resultData['countContainers'] . "\n";

        $container10ftStandardDryContainer = $this->make10ftStandardDryContainer();
        $resultData = $this->runPacking($boxLits, $container10ftStandardDryContainer)->getData();

        echo "Count of 10ft Standard Dry Containers: " . $resultData['countContainers'];
        echo "\n";
        echo "End of transport two method";
        echo "\n";
    }

    public function transportThree()
    {
        echo "\n";
        echo "transport three method is called";

        $boxLitsOne = $this->makeBoxes(
            80,
            100,
            200,
            10
        );
        $boxLitsTwo = $this->makeBoxes(
            60,
            80,
            150,
            25
        );
        $boxLits = array_merge($boxLitsOne, $boxLitsTwo);

        $container40ftStandardDryContainer = $this->make40ftStandardDryContainer();
        $container10ftStandardDryContainer = $this->make10ftStandardDryContainer();

        $this->writeInfoAboutBox($boxLitsOne[0], count($boxLitsOne));
        $this->writeInfoAboutBox($boxLitsTwo[0], count($boxLitsTwo));

        echo "\n";
        $resultData = $this->runPacking($boxLits, $container40ftStandardDryContainer)->getData();
        echo "Count of 40ft Standard Dry Containers: " . $resultData['countContainers'] . "\n";

        $container10ftStandardDryContainer = $this->make10ftStandardDryContainer();
        $resultData = $this->runPacking($boxLits, $container10ftStandardDryContainer)->getData();

        echo "Count of 10ft Standard Dry Containers: " . $resultData['countContainers'];
        echo "\n";
        echo "End of transport three method";
        echo "\n";
    }

    private function writeInfoAboutBox(Box $box, int $count)
    {
        echo "\n";
        echo "{$count} boxes with size: " . $box->getWidth() . "x" . $box->getHeight() . "x" . $box->getDepth();
        echo "\n";
    }

    private function runPacking(array $boxes, Container $container)
    {
        $packingAlgorithm = new GreedyPackingAlgorithm($boxes, $container);
        $packingService = new PackingService($packingAlgorithm);

        $command = PackingCommand::init(
            $packingService
        );

        $command->execute();
        return $command->getResult();
    }

    private function makeBoxes(
        float $width = 78,
        float $height = 79,
        float $length = 93,
        int $count = 27
    ) {
        $boxSize = [
            'width' => $width,
            'height' => $height,
            'depth' => $length
        ];
        $boxes = [];

        for ($i = 0; $i < $count; $i++) {
            $boxes[] = $boxSize;
        }

        $command = InitBoxesCommand::init($boxes);
        $command->execute();

        return $command->getResult()->getData();
    }

    private function make40ftStandardDryContainer(): Container
    {
        $size = $this->getSize40ftStandardDryContainer();
        return $this->makeContainer($size);
    }

    private function make10ftStandardDryContainer(): Container
    {
        $size = $this->getSize10ftStandardDryContainer();
        return $this->makeContainer($size);
    }

    private function makeContainer($size): Container
    {
        $command = InitContainersCommand::init([$size]);
        $command->execute();

        return current($command->getResult()->getData());
    }

    private function getSize40ftStandardDryContainer()
    {
        return [
            'width' => 234.8,
            'height' => 238.44,
            'depth' => 1203.1
        ];
    }

    private function getSize10ftStandardDryContainer()
    {
        return [
            'width' => 234.8,
            'height' => 238.44,
            'depth' => 279.4
        ];
    }
}
