<?php

namespace mepoooe\cargoPuzzleMaster\commands;

use mepoooe\cargoPuzzleMaster\commands\helpers\CommandHelper;
use mepoooe\cargoPuzzleMaster\interfaces\CommandInterface;
use mepoooe\cargoPuzzleMaster\services\PackingService;
use mepoooe\cargoPuzzleMaster\utils\Result;

class PackingCommand implements CommandInterface
{
    use CommandHelper;

    protected Result $result;


    public static function init(PackingService $packingService): self
    {
        return new self($packingService);
    }

    public function __construct(private PackingService $packingService) {}

    public function execute(): void
    {
        $this->packingService->packing();
        $packingResult = $this->packingService->getResult();
        $this->result = Result::ok(['countContainers' => $packingResult->getData()['countContainers']]);
    }
}
