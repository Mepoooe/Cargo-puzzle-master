<?php

namespace mepoooe\cargoPuzzleMaster\tests;

use mepoooe\cargoPuzzleMaster\Demo;

class DemoTest extends \PHPUnit\Framework\TestCase
{
    public function testTransportOne()
    {
        $demo = new Demo();
        $demo->transportOne();

        $this->assertTrue(true);
    }

    public function testTransportTwo()
    {
        $demo = new Demo();
        $demo->transportTwo();

        $this->assertTrue(true);
    }

    public function testTransportThree()
    {
        $demo = new Demo();
        $demo->transportThree();

        $this->assertTrue(true);
    }
}