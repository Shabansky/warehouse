<?php

namespace Warehouse;

trait VolumetricStructureGettable
{

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