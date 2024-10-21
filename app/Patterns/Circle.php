<?php

namespace App\Patterns;

class Circle implements Shapeable
{
    public mixed $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function area()
    {
        return $this->radius * $this->radius *pi();
    }
}
