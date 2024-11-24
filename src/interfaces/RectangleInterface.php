<?php

namespace mepoooe\cargoPuzzleMaster\interfaces;

interface RectangleInterface
{
    public function getWidth(): float;
    public function getHeight(): float;
    public function getArea(): float;
    public function getPerimeter(): float;
}