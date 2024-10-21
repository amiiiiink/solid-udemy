<?php

namespace App\Patterns;

class Circle implements Shapeable
{
    public mixed $radius;

    public function __construct($radius = 110)
    {
        $this->radius = $radius;
    }

    public function area(): float|int
    {
        return $this->radius * $this->radius * pi();
    }
}
