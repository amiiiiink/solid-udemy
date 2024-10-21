<?php

namespace App\Patterns;


class AreaCalculator
{
    public function calculate(Shapeable $shapeable): float|int
    {
        return $shapeable->area();
    }
}
