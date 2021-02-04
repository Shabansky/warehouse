<?php

namespace Organizers;

use Services\MetricConverter;
use Warehouse\ProductList;
use Warehouse\Warehouse;

class DimensionsCalculator
{
    private CalculatorStrategy $strategy;
    private Warehouse $warehouse;
    private ProductList $productsList;

    public function __construct(Warehouse $warehouse, ProductList $productList){
        $this->warehouse = $warehouse;
        $this->productsList = $productList;
    }

    public function setCalculationStrategy(CalculatorStrategy $strategy) :void
    {
        $this->strategy = $strategy;
        $this->strategy->setProductList($this->productsList);
        $this->strategy->setWarehouse($this->warehouse);
    }

    public function execCalculationStrategy() :void{
        $this->warehouse->setDimensions($this->strategy->calculate());
    }

    public function printInfo() :void{
        echo sprintf(
            "Warehouse Info:\n
Number of products : %d
Max number of copies per model : %d
Length : %g m
Width : %g m
Height : %g m\n"
            ,
            $this->productsList->getList()->count(),
            $this->warehouse->getProductsMax(),
            MetricConverter::MillimeterToMeter($this->warehouse->getLength()),
            MetricConverter::MillimeterToMeter($this->warehouse->getWidth()),
            MetricConverter::MillimeterToMeter($this->warehouse->getHeight())
        );
    }
}