<?php

namespace mepoooe\cargoPuzzleMaster\tests;

use mepoooe\cargoPuzzleMaster\commands\InitContainersCommand;
use mepoooe\cargoPuzzleMaster\models\Container;
use mepoooe\cargoPuzzleMaster\utils\Result;

class InitContainersCommandTest extends \PHPUnit\Framework\TestCase
{
    public function testInit()
    {
        $mockData = [MockDataHelper::createMock40ftStandardDryContainer()];

        $command = InitContainersCommand::init($mockData);
        $this->assertInstanceOf(InitContainersCommand::class, $command);
    }

    public function testExecute()
    {
        $mockData = [MockDataHelper::createMock40ftStandardDryContainer()];
        
        $command = InitContainersCommand::init($mockData);
        $command->execute();

        $this->assertInstanceOf(Result::class, $command->getResult());
        $this->assertInstanceOf(Container::class, current($command->getResult()->getData()));
    }
}