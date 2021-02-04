<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

use Organizers\DimensionsCalculator;
use Organizers\CalculatorStrategyNaive;
use Services\Connection;
use Services\MetricConverter;
use Warehouse\ProductList;
use Warehouse\Warehouse;


try{
    $conn = new Connection($config['conn']['dsn'], $config['conn']['user'], $config['conn']['pass']);

    $productList = new ProductList($conn);
    $productList->getFromSource();

    $warehouse = new Warehouse();
    $warehouse->setHeight(MetricConverter::MeterToMillimeter($config['calculator']['warehouse_ceil']));
    $warehouse->setProductsMax($config['calculator']['max_num_of_product']);

    $calculator = new DimensionsCalculator($warehouse, $productList);
    $calculator->setCalculationStrategy(new CalculatorStrategyNaive());
    $calculator->execCalculationStrategy();
    $calculator->printInfo();
}catch(InvalidArgumentException | PDOException $e){
    echo $e->getMessage() . "\n";
}
