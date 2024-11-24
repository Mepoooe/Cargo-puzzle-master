<?php

namespace mepoooe\cargoPuzzleMaster\tests;

use mepoooe\cargoPuzzleMaster\algorithms\GreedyPackingAlgorithm;
use mepoooe\cargoPuzzleMaster\commands\InitBoxesCommand;
use mepoooe\cargoPuzzleMaster\commands\InitContainersCommand;
use mepoooe\cargoPuzzleMaster\commands\PackingCommand;
use mepoooe\cargoPuzzleMaster\services\PackingService;
use mepoooe\cargoPuzzleMaster\utils\Result;

class PackingCommandTest extends \PHPUnit\Framework\TestCase
{
    public function testInit()
    {
        $command = $this->initTestCommand();
        $this->assertInstanceOf(PackingCommand::class, $command);
    }

    public function testExecute()
    {
        $command = $this->initTestCommand();
        $command->execute();

        $this->assertInstanceOf(Result::class, $command->getResult());
        $this->assertIsArray($command->getResult()->getData());

        $countContainers = 1;
        $resultData = $command->getResult()->getData();
        
        $this->assertArrayHasKey('countContainers', $resultData);
        $this->assertSame($countContainers, $resultData['countContainers']);
    }

    private function initTestCommand(): PackingCommand
    {
        $boxesMockData = MockDataHelper::getMockBoxesData();
        $containersMockData = [MockDataHelper::createMock40ftStandardDryContainer()];

        $initBoxesCommand = InitBoxesCommand::init($boxesMockData);
        $initBoxesCommand->execute();

        $boxes = $initBoxesCommand->getResult()->getData();

        $initContainersCommand = InitContainersCommand::init($containersMockData);
        $initContainersCommand->execute();

        $container = current($initContainersCommand->getResult()->getData());

        $packingAlgorithm = new GreedyPackingAlgorithm($boxes, $container);

        $packingService = new PackingService($packingAlgorithm);

        return PackingCommand::init(
            $packingService
        );
    }
}
