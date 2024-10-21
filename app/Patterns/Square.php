<?php

namespace App\Patterns;

class Square implements Shapeable
{
    public mixed $height;
    public mixed $width;

    public function __construct($height, $width)
    {
        $this->height = $height;
        $this->width = $width;
    }

    public function area()
    {
        return $this->width * $this->height;
    }
}
