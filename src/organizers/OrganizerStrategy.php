<?php

namespace Organizers;

use Warehouse\Warehouse;
use Warehouse\ProductList;

abstract class OrganizerStrategy
{

    protected ProductList $productList;
    protected Warehouse $warehouse;

    public function __construct(ProductList $productList, Warehouse $warehouse){
        $this->productList = $productList;
        $this->warehouse = $warehouse;
    }

    abstract public function calculate() : OrganizerResult;
}