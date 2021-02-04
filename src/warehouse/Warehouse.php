<?php

namespace Warehouse;

use Organizers\CalculatorResult;
use Services\MetricConverter;

class Warehouse
{
    use VolumetricStructureGettable;
    use VolumetricStructureSettable;

    private float $length = 0;
    private float $width = 0;
    private float $height = 0;
    private float $area;
    private int $productsMax;


    public function setDimensions(CalculatorResult $result) :void
    {
        $this->setLength($result->getLength());
        $this->setWidth($result->getWidth());
        $this->setHeight($result->getHeight());
    }

    public function setProductsMax(int $max) :void
    {
        $this->productsMax = $max;
    }

    public function getProductsMax() :int{
        return $this->productsMax;
    }

    public function printWarehouseInfo() :void{
        echo sprintf(
            "Warehouse Info:\n
Max number of copies per model : %d
Length : %g m
Width : %g m
Height : %g m\n"
            ,
            $this->getProductsMax(),
            MetricConverter::MillimeterToMeter($this->getLength()),
            MetricConverter::MillimeterToMeter($this->getWidth()),
            MetricConverter::MillimeterToMeter($this->getHeight())
        );
    }
}