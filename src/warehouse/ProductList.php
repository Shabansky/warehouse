<?php
namespace Warehouse;

use PDO;
use ArrayIterator;
use \Services\Connection;

class ProductList
{
    private Connection $connection;

    private ArrayIterator $products;

    public function __construct(Connection $connection){
        $this->connection = $connection;
    }

    public function getFromSource() :void{
        $stm = $this->connection->get()->query("SELECT model,length,width,height FROM product");
        $products = [];
        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $product){
            $obj = new Product();
            $obj->setModel($product->model);
            $obj->setLength($product->length);
            $obj->setWidth($product->width);
            $obj->setHeight($product->height);
            $products[] = $obj;
        }
        $this->products = new ArrayIterator($products);
    }

    public function getList() :ArrayIterator
    {
        return $this->products;
    }

    public function getFirst() :Product
    {
        $this->products->seek(0);
        return $this->getList()->current();
    }

    public function getLast() :Product
    {
        $this->products->seek($this->products->count() -1);
        return $this->getList()->current();
    }

    public function filterByMaxHeight(float $height) :void
    {
        while($this->products->valid()){
            $product = $this->products->current();
            if(!$product->hasSideLessThan($height)){
                $this->products->offsetUnset($this->products->key());
                continue;
            }
            $this->products->next();
        }
    }

    public function sortByDimension(callable $dimension): ProductList
    {
        //TODO: Replace $dimension with a callable to replace the anonymous function below.
        $this->products->uasort(function(Product $a,Product $b){
            $pa = $a->$dimension();
            $pb = $b->$dimension();
            if($pa === $pb) {
                return 0;
            }
            return($pa < $pb) ? -1 : 1;
        });
        return $this;
    }

}