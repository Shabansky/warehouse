<?php

namespace Warehouse;

use \InvalidArgumentException;
use Organizers\CalculatorResult;

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
        if($max <= 0 && is_int($max)){
            throw new InvalidArgumentException('Product max number must be a positive number.');
        }
        $this->productsMax = $max;
    }

    public function getProductsMax() :int{
        return $this->productsMax;
    }


}