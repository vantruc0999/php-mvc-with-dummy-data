<?php

class ProductController
{

    private $productModel, $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel;
    }

    private function view($viewPath, array $data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        return require('Views' . '/' . str_replace('.', '/', $viewPath) . '.php');
    }

    private function getProductIdByReview($review)
    {
        // global $reviews;
        // $reviews_list = array();
        // foreach ($reviews as $item) {
        //     if ($item['rate'] == $review) {
        //         $reviews_list[] = $item['product_id'];
        //     }
        // }
        // return $reviews_list;

        $reviews = new ReviewModel;
        $reviews_list = $reviews->getAllProductReviews();
        $product_id_list = array();

        foreach($reviews_list as $item){
            if($item['rate'] == $review){
                $product_id_list[] = $item['product_id'];
            }
        }
        
        return $product_id_list;
    }

    private function filterProduct($key, $values, $arr)
    {
        $res = array();
        foreach ($arr as $product) {
            switch ($key) {
                case 'product_name':
                    if (str_contains(strtolower($product['name']), strtolower($values[0])))
                        $res[] = $product;
                    break;
                case 'price':
                    if ($product['price'] > $values[0] && $product['price'] < $values[1])
                        $res[] = $product;
                    break;
            }
        }
        return $res;
    }

    private function getColorName($colors_list){
        $colors_name = array();
        foreach($colors_list as $item){
            $colors_name[] = $item['color_name'];
        }
        return $colors_name;
    }

    public function index()
    {
        $this->categoryModel = new CategoryModel;

        $products = $this->productModel->getAllProducts();
        $categories = $this->categoryModel->getAllCategories();

        $colors = new ColorModel;
        $colors_list = $colors->getAllColors();
        $colors_name = $this->getColorName($colors_list);

        $products_list = array();

        // Get product name from search bar
        $product_name = $_GET['product_name'] ?? "";

        // Get min range
        $min_price = $_GET['min_price'] ?? "";
        $max_price = $_GET['max_price'] ?? "";



        // Start filter
        $products_list = $products;

        if ($product_name) {
            $products_list = $this->filterProduct('product_name', [$product_name], $products_list);
        }

        if ($min_price) {
            $products_list = $this->filterProduct('price', [$min_price, $max_price], $products_list);
        }


        return $this->view(
            'products.index',
            [
                'products_list' => $products_list,
                'categories_list' => $categories,
                'product_name' => $product_name,
                'colors_name' => $colors_name,
            ]
        );
    }

    public function show()
    {
        $product_id = $_GET['pid'];

        $products = $this->productModel->getAllProducts();

        $this->productModel = new ProductModel;
        $product_detail = $this->productModel->getDetailProduct($product_id);

        $this->categoryModel = new CategoryModel;
        $categories = $this->categoryModel->getAllCategories();

        $reviews = new ReviewModel;
        $reviews_list = $reviews->getAllProductReviews();

        foreach($reviews_list as $item){
            if($item['product_id'] == $product_id)
                $rate = $item['rate'];
        }

        return $this->view(
            'products.detail-page',
            [
                'product_detail' => $product_detail,
                'categories' => $categories,
                'products_list' => $products,
                'rate' => $rate,
            ]
        );
    }
}
