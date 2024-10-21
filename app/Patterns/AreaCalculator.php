<?php

namespace App\Patterns;


class AreaCalculator
{
    public function calculate(Shapeable $shapeable): float|int
    {
        return $shapeable->area();
//        if(is_a($shape,Triangle::class)){
//            return $shape->height * $shape->base / 2;
//        }
//        return $shape->width * $shape->height;
    }
}
