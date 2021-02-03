<?php
namespace Warehouse;

trait VolumetricStructureSettable
{

    public function setLength(float $length): void
    {
        $this->length = $length;
    }

    public function setWidth(float $width): void
    {
        $this->width = $width;
    }

    public function setHeight(float $height): void
    {
        $this->height = $height;
    }

}