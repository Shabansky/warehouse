<?php

namespace Organizers;

use Warehouse\Warehouse;
use Warehouse\ProductList;

abstract class OrganizerStrategy
{

    protected ProductList $productList;
    protected Warehouse $warehouse;

    public function setWarehouse(Warehouse $warehouse){
        $this->warehouse = $warehouse;
    }

    public function setProductList(ProductList $productList){
        $this->productList = $productList;
    }

    abstract public function calculate() : OrganizerResult;
}