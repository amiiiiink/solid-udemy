<?php

namespace App\Patterns;

class Triangle
{
    public mixed $height;
    public mixed $base;

    public function __construct($height, $base)
    {
        $this->height = $height;
        $this->base = $base;
    }
}
