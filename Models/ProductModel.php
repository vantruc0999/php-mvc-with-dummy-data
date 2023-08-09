<?php

class ProductModel
{
    private $product_lists;

    public function __construct()
    {
        global $products;
        $this->product_lists = $products;
    }

    public function getAllProducts()
    {
        return $this->product_lists;
    }

    public function getDetailProduct($id)
    {
        foreach ($this->product_lists as $product) {
            if ($product['product_id'] == $id) {
                $product_detail = $product;
            }
        }
        return $product_detail;
    }
}
