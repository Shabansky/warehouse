<?php

namespace Services;

class MetricConverter
{
    public static function MillimeterToMeter(float $millimeters) :float{
        return number_format($millimeters / 1000, 2);
    }

    public static function MeterToMillimeter(float $meters){
        return $meters * 1000;
    }
}