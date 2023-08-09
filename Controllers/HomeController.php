<?php

class HomeController
{
    private $productModel;
    private $categoryModel;

    private function view($viewPath, array $data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        return require('Views' . '/' . str_replace('.', '/', $viewPath) . '.php');
    }

    public function index($limit=8)
    {
        $this->productModel = new ProductModel;

        $this->categoryModel = new CategoryModel;

        $products = $this->productModel->getAllProducts();
        $cateories = $this->categoryModel->getAllCategories();

        $product_name = $_GET['product_name'] ?? "";

        $products_list= array();

        foreach ($products as $product) {
            if (str_contains(strtolower($product['name']), strtolower($product_name))) {
                $products_list[] = $product;
            }
        }

        return $this->view(
            'index',
            [
                'product_name' => $product_name,
                'products_list' => $products_list,
                'categories_list' => $cateories,
            ]
        );
    }
}
