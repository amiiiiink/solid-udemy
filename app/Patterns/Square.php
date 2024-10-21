<?php

namespace App\Patterns;

class Square
{
    public mixed $height;
    public mixed $width;

    public function __construct($height, $width)
    {
        $this->height = $height;
        $this->width = $width;
    }
}
