<?php

namespace Organizers;

class OrganizerResult
{
    private float $length;
    private float $width;
    private float $height;

    public function __construct(float $length, float $width, float $height){
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    public function getLength() : float{
        return $this->length;
    }

    public function getWidth() : float{
        return $this->width;
    }

    public function getHeight() : float{
        return $this->height;
    }
}