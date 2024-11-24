<?php

namespace mepoooe\cargoPuzzleMaster\algorithms\helpers;

use mepoooe\cargoPuzzleMaster\models\BaseRectangle;

trait RectangleSpaceCalculator
{
    /**
     *
     * @param BaseRectangle[] $rectangles
     */
    public function calculateUsedVolume(array $rectangles): float
    {
        $usedVolume = 0;

        foreach ($rectangles as $rectangle) {
            $usedVolume += $rectangle->getVolume();
        }

        return $usedVolume;
    }

    /**
     *
     * @param BaseRectangle[] $nestedRectangles
     * @return float
     */
    public function calculateAvailableVolume(BaseRectangle $mainRectangle, array $nestedRectangles): float
    {
        $usedVolume = $this->calculateUsedVolume($nestedRectangles);

        return $mainRectangle->getVolume() - $usedVolume;
    }
}