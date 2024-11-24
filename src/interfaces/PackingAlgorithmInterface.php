<?php

namespace mepoooe\cargoPuzzleMaster\interfaces;

use mepoooe\cargoPuzzleMaster\utils\Result;

interface PackingAlgorithmInterface
{
    public function packing(): void;
    public function getResult(): Result;
}