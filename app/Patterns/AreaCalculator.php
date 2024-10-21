<?php

namespace App\Patterns;

//square class
class Square
{
    public mixed $height;
    public mixed $width;

    public function __construct($height, $width)
    {
        $this->height = $height;
        $this->width = $width;
    }
}



class AreaCalculator
{
    public function calculate($shape): float|int
    {
        return $shape->width * $shape->height;
    }
}
