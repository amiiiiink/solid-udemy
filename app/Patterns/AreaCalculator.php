<?php

namespace App\Patterns;


class AreaCalculator
{
    public function calculate($shape): float|int
    {
        if(is_a($shape,Triangle::class)){
            return $shape->height * $shape->base / 2;
        }
        return $shape->width * $shape->height;
    }
}
