<?php

class ColorProductModel
{
    private $colors_products;

    public function __construct()
    {
        global $color_products ;
        $this->colors_products = $color_products;
    }

    public function getAllColorsProducts()
    {
        return $this->colors_products;
    }
}

