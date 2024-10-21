<?php

namespace App\Patterns;

class Triangle implements Shapeable
{
    public mixed $height;
    public mixed $base;

    public function __construct($height, $base)
    {
        $this->height = $height;
        $this->base = $base;
    }

    public function area()
    {
        return $this->height * $this->base / 2;
    }
}
