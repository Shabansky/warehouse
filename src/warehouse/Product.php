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

    public function canRoll() :bool
    {
        return true;
    }

    /**
     * @param float $length - in mm
     * @return bool
     */
    public function hasSideLessThan(float $length) :bool
    {

        return (bool) count(array_filter([$this->getLength(),$this->getWidth(),$this->getHeight()],
            static function($d) use ($length) {return $d < $length;}));
    }

    public function rotateToFace() :void
    {
        $width = $this->getWidth();
        $this->setWidth($this->getHeight());
        $this->setHeight($width);
    }

    public function rotateToSide() :void
    {
        $length = $this->getLength();
        $this->setLength($this->getHeight());
        $this->setHeight($length);
    }

}