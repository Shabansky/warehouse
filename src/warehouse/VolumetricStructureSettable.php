<?php
namespace Warehouse;

use \InvalidArgumentException;

trait VolumetricStructureSettable
{

    public function setLength(float $length): void
    {
        if(!$this->dimensionIsValid($length)) {
            throw new InvalidArgumentException('Length must be a valid positive number.');
        }
        $this->length = $length;
    }

    public function setWidth(float $width): void
    {
        if(!$this->dimensionIsValid($width)) {
            throw new InvalidArgumentException('Width must be a valid positive number.');
        }
        $this->width = $width;
    }

    public function setHeight(float $height): void
    {
        if(!$this->dimensionIsValid($height)) {
            throw new InvalidArgumentException('Height must be a valid positive number.');
        }
        $this->height = $height;
    }

    public function dimensionIsValid(float $dimension): bool
    {
        return ($dimension > 0 && is_numeric($dimension));
    }
}