<?php

namespace mepoooe\cargoPuzzleMaster\tests;

class MockDataHelper
{
    public static function getMockBoxesData(
        float $width = 78,
        float $height = 79,
        float $length = 93,
        int $count = 27
    ) {
        $boxSize = [
            'width' => $width,
            'height' => $height,
            'depth' => $length
        ];
        $boxes = [];

        for ($i = 0; $i < $count; $i++) {
            $boxes[] = $boxSize;
        }

        return $boxes;
    }

    public static function createMock40ftStandardDryContainer() {
        return [
            'width' => 234.8,
            'height' => 238.44,
            'depth' => 1203.1
        ];
    }
    
    public static function createMock10ftStandardDryContainer() {
        return [
            'width' => 234.8,
            'height' => 238.44,
            'depth' => 279.4
        ];
    }
}
