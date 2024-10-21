<?php

namespace App\Patterns;

class Square implements Shapeable
{
    public mixed $height;
    public mixed $width;

    public function __construct($height = 8, $width = 9)
    {
        $this->height = $height;
        $this->width = $width;
    }

    public function area(): float|int
    {
        return $this->width * $this->height;
    }
}
