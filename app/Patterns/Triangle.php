<?php

namespace App\Patterns;

class Triangle implements Shapeable
{
    public mixed $height;
    public mixed $base;

    public function __construct($height = 10, $base = 90)
    {
        $this->height = $height;
        $this->base = $base;
    }

    public function area(): float|int
    {
        return $this->height * $this->base / 2;
    }
}
