<?php

namespace Alshugairi;

class Board
{
    protected $height;
    protected $width;

    public function __construct($height, $width)
    {
        $this->height = $height;
        $this->width = $width;
    }

    public function withinBounds($x, $y)
    {
        return (0 <= $x && $x < $this->width) && (0 <= $y && $y < $this->height);
    }
}