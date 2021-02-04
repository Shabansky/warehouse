<?php

namespace Organizers;

use Warehouse\Product;

class CalculatorStrategyNaive extends CalculatorStrategy
{
    public function calculate(): CalculatorResult
    {
        $this->filterProducts();
        $areaTotal = 0;
        foreach($this->productList->getList()->getArrayCopy() as $product){
            $areaTotal += $this->calculateProductArea($product);
        }
        $areaTotal *= $this->warehouse->getProductsMax();
        $side = sqrt($areaTotal);
        return new CalculatorResult($side, $side, $this->warehouse->getHeight());
    }

    private function calculateProductArea(Product $product) : float {
        return $product->getLength() * $product->getWidth();
    }

    private function filterProducts() :void
    {
        $this->productList->filterByMaxHeight($this->warehouse->getHeight());
    }
}