<?php

namespace App\Patterns;


class AreaCalculator
{
    public function calculate($shape): float|int
    {
        return $shape->width * $shape->height;
    }
}
