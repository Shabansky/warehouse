<?php

namespace Warehouse;

use Organizers\OrganizerResult;
use Services\MetricConverter;

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
        $this->setLength($result->getLength());
        $this->setWidth($result->getWidth());
    }

    public function printWarehouseInfo() :void{
        echo sprintf(
            "Warehouse Info:\n
Length : %g m
Width : %g m
Height : %g m\n"
            ,
            MetricConverter::MillimeterToMeter($this->getLength()),
            MetricConverter::MillimeterToMeter($this->getWidth()),
            MetricConverter::MillimeterToMeter($this->getHeight())
        );
    }
}