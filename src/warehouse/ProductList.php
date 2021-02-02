<?php
namespace Warehouse;

use PDO;
use \Services\Connection;

class ProductList
{
    private Connection $connection;

    private Array $products;

    public function __construct(Connection $connection){
        $this->connection = $connection;
    }

    public function getFromSource() :void{
        $stm = $this->connection->get()->query("SELECT model,length,width,height FROM product");
        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $product){
            $obj = new Product();
            $obj->setModel($product->model);
            $obj->setLength($product->length);
            $obj->setWidth($product->width);
            $obj->setHeight($product->height);
            $this->products[] = $obj;
        }
    }

}