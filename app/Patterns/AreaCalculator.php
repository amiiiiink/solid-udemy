<?php

namespace App\Patterns;


class AreaCalculator
{
    public function __construct(public Shapeable $shapeable)
    {
    }

    public function calculate(): float|int
    {
        return $this->shapeable->area();
    }
}
