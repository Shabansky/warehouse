<?php
namespace Warehouse;

class Product
{

    use VolumetricStructureGettable;
    use VolumetricStructureSettable;

    private string $model;

    private float $length;
    private float $width;
    private float $height;

    public function __construct() {

    }

    public function setModel(string $model) :void{
        $this->model = $model;
    }

    public function getModel() :string{
        return $this->model;
    }

}