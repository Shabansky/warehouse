<?php

namespace Organizers;

use Warehouse\Warehouse;
use Warehouse\ProductList;

abstract class CalculatorStrategy
{

    protected ProductList $productList;
    protected Warehouse $warehouse;

    public function setWarehouse(Warehouse $warehouse) :void
    {
        $this->warehouse = $warehouse;
    }

    public function setProductList(ProductList $productList) :void
    {
        $this->productList = $productList;
    }

    abstract public function calculate() : CalculatorResult;
}