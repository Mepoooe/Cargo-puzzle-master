<?php

namespace mepoooe\cargoPuzzleMaster\tests;

use mepoooe\cargoPuzzleMaster\commands\InitBoxesCommand;
use mepoooe\cargoPuzzleMaster\models\Box;
use mepoooe\cargoPuzzleMaster\utils\Result;

class InitBoxesCommandTest extends \PHPUnit\Framework\TestCase
{
    public function testInit()
    {
        $mockData = MockDataHelper::getMockBoxesData();

        $command = InitBoxesCommand::init($mockData);
        $this->assertInstanceOf(InitBoxesCommand::class, $command);
    }

    public function testExecute()
    {
        $mockData = MockDataHelper::getMockBoxesData();
        
        $command = InitBoxesCommand::init($mockData);
        $command->execute();

        $this->assertInstanceOf(Result::class, $command->getResult());
        $this->assertInstanceOf(Box::class, current($command->getResult()->getData()));
    }
}