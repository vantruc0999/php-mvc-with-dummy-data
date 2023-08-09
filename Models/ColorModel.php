<?php

class ColorModel
{
    private $color_lists;

    public function __construct()
    {
        global $colors;
        $this->color_lists = $colors;
    }

    public function getAllColors()
    {
        return $this->color_lists;
    }
}

