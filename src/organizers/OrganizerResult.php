<?php

namespace Organizers;

use Warehouse\VolumetricStructureGettable;

class OrganizerResult
{

    use VolumetricStructureGettable;

    private float $length;
    private float $width;
    private float $height;

    public function __construct(float $length, float $width, float $height){
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

}