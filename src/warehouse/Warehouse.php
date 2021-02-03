<?php

namespace Warehouse;

use Organizers\OrganizerResult;

class Warehouse
{
    use VolumetricStructureGettable;
    use VolumetricStructureSettable;

    private float $length;
    private float $width;
    private float $height;
    private float $area;
    private int $productsMax;

    public function __construct(){
        $this->length = $this->width = $this->height = 0;
    }

    public function setDimensions(OrganizerResult $result){
        $this->setHeight($result->getHeight());
        $this->setHeight($result->getHeight());
    }
}