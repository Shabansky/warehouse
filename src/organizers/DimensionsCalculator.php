<?php

namespace Organizers;

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

    public function execCalculationStrategy() :CalculatorResult{
        return $this->strategy->calculate();
    }
}