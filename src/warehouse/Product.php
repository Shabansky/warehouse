<?php
namespace Warehouse;

class Product
{

    private string $model;

    private float $length;
    private float $width;
    private float $height;

    public function __construct() {

    }

    public function setModel(string $model) :void{
        $this->model = $model;
    }

    public function setLength(float $length) :void{
        $this->length = $length;
    }

    public function setWidth(float $width) :void{
        $this->width = $width;
    }

    public function setHeight(float $height) :void{
        $this->height = $height;
    }

    public function getModel() :string{
        return $this->model;
    }

    public function getLength() :float{
        return $this->length;
    }

    public function getWidth() :float{
        return $this->width;
    }

    public function getHeight() :float{
        return $this->height;
    }

}