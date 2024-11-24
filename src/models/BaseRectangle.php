<?php

namespace mepoooe\cargoPuzzleMaster\models;

use mepoooe\cargoPuzzleMaster\interfaces\RectangleInterface;

abstract class BaseRectangle implements RectangleInterface
{
    public function __construct(protected float $width, protected float $height, protected ?float $depth = null) {}

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getArea(): float
    {
        return $this->width * $this->height;
    }

    public function getPerimeter(): float
    {
        return 2 * ($this->width + $this->height);
    }
    
    public function getDepth(): ?float
    {
        return $this->depth;
    }
    
    public function getVolume(): float
    {
        if ($this->depth === null) {
            throw new \Exception('Depth is not set');
        }

        return $this->width * $this->height * $this->depth;
    }
}
