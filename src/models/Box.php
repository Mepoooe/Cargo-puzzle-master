<?php

namespace mepoooe\cargoPuzzleMaster\models;

class Box extends BaseRectangle
{
    public function __construct(protected float $width, protected float $height, protected ?float $depth = null)
    {
        parent::__construct($width, $height, $depth);
    }

    public static function init(float $width, float $height, ?float $depth = null): self
    {
        return new self($width, $height, $depth);
    }
}