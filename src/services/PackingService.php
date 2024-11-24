<?php

namespace mepoooe\cargoPuzzleMaster\services;

use mepoooe\cargoPuzzleMaster\interfaces\PackingAlgorithmInterface;
use mepoooe\cargoPuzzleMaster\utils\Result;

class PackingService
{
    private Result $result;

    public function __construct(protected PackingAlgorithmInterface $packingAlgorithm)
    {}

    public function packing(): void
    {
        $this->packingAlgorithm->packing();
        
        $filledContainers = [];
        if ($this->packingAlgorithm->getResult()->isOK()) {
            $filledContainers = $this->packingAlgorithm->getResult()->getData()['filledContainers'];
        }
        
        $this->result = Result::ok([
            'countContainers' => count($filledContainers),
            'containers' => $filledContainers
        ]);
    }

    public function getResult(): Result
    {
        return $this->result;
    }
}