<?php
require_once __DIR__ . '/vendor/autoload.php';

use Organizers\DimensionsCalculator;
use Organizers\CalculatorStrategyNaive;
use Services\Connection;
use Services\MetricConverter;
use Warehouse\ProductList;
use Warehouse\Warehouse;

$conn = new Connection('mysql:dbname=julia;host=127.0.0.1','root','');
$productList = new ProductList($conn);
$productList->getFromSource();

$warehouse = new Warehouse();
$warehouse->setHeight(MetricConverter::MeterToMillimeter(8));
$warehouse->setProductsMax(5);

$calculator = new DimensionsCalculator($warehouse, $productList);
$calculator->setCalculationStrategy(new CalculatorStrategyNaive());

$warehouse->setDimensions($calculator->execCalculationStrategy());
$warehouse->printWarehouseInfo();