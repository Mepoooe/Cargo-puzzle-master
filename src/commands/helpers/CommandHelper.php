<?php 

namespace mepoooe\cargoPuzzleMaster\commands\helpers;

use mepoooe\cargoPuzzleMaster\utils\Result;

trait CommandHelper
{
    public function getResult(): Result
    {
        return $this->result;
    }
}