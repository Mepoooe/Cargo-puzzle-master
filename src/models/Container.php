<?php

namespace mepoooe\cargoPuzzleMaster\models;

use mepoooe\cargoPuzzleMaster\algorithms\helpers\RectangleSpaceCalculator;

class Container extends BaseRectangle
{
    use RectangleSpaceCalculator;

    const SEA_CONTAINER_TYPE_ID = 1;

    /**
     * @var Box[]
     */
    private array $boxes = [];


    public function __construct(
        protected int $typeId,
        protected float $width,
        protected float $height,
        protected ?float $depth = null
    ) {
        parent::__construct($width, $height, $depth);
    }

    public static function init(int $typeId, float $width, float $height, float $depth): self
    {
        return new self($typeId, $width, $height, $depth);
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function addBox(Box $box): void
    {
        $this->boxes[] = $box;
    }

    public function canFitBox(Box $box): bool
    {
        $availableVolume = $this->calculateAvailableVolume($this, $this->boxes);

        if ($availableVolume < $box->getVolume()) {
            return false;
        }

        return true;
    }
}
