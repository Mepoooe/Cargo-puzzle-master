<?php

namespace mepoooe\cargoPuzzleMaster\utils;

use mepoooe\cargoPuzzleMaster\models\Box;

class ResultFormatter
{
    public function __construct(private Result $result)
    {}

    public function format(): string
    {
        $formattedResult = '';
        $boxes = $this->result->getData()['boxes'];
        foreach ($boxes as $box) {
            $formattedResult .= $this->formatBox($box);
        }
        return $formattedResult;
    }

    private function formatBox(Box $box): string
    {
        $formattedBox = '$b';
        $formattedBox .= $box->getWidth() . ' x ' . $box->getHeight() . ' x ' . $box->getDepth();
        return $formattedBox;
    }
}