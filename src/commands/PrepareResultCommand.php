<?php

namespace mepoooe\cargoPuzzleMaster\commands;

use mepoooe\cargoPuzzleMaster\interfaces\CommandInterface;

class PrepareResultCommand implements CommandInterface
{
    public function execute(): void
    {
        echo "Init Result command executed\n";
    }
}