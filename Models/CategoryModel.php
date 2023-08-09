<?php

class CategoryModel
{
    private $categories_lists;

    public function __construct()
    {
        global $categories;
        $this->categories_lists = $categories;
    }


    public function getAllCategories()
    {
        return $this->categories_lists;
    }
}

