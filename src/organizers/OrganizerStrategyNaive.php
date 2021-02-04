<?php

namespace Organizers;

use Warehouse\Product;

class OrganizerStrategyNaive extends OrganizerStrategy
{
    public function calculate(): OrganizerResult
    {
        $areaTotal = 0;
        foreach($this->productList->getList()->getArrayCopy() as $product){
            $areaTotal += $this->calculateProductArea($product);
        }
        $areaTotal *= $this->warehouse->getProductsMax();
        $side = sqrt($areaTotal);
        return new OrganizerResult($side,$side,$this->warehouse->getHeight());
    }

    private function calculateProductArea(Product $product) : float {
        return $product->getLength() * $product->getWidth();
    }
}