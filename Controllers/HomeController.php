<!-- Đây là controller mặc định khi người dùng lần đầu tiên tới trang web -->
<?php

class HomeController
{
    private $productModel;
    private $categoryModel;

    // Sử dụng khái niệm biến biến để biến key của một mảng thành một biến mới với giá trị đã được gán
    private function view($viewPath, array $data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        //Thay vì truyền vào biến $viewpath = "Views/tên_folder.php/tênfile.php" thì đổi kiểu này cho giống laravel 
        return require('Views' . '/' . str_replace('.', '/', $viewPath) . '.php');
    }

    //Nếu action = index hoặc không có action thì hàm này sẽ được gọi
    public function index()
    {
        // Lấy data từ model
        $this->productModel = new ProductModel;
        $this->categoryModel = new CategoryModel;

        // Gọi hàm trong model
        $products = $this->productModel->getAllProducts();
        $categories = $this->categoryModel->getAllCategories();

        //Gọi trang home kèm theo hai biến products_list và categories_list
        return $this->view(
            'index',
            [
                'products_list' => $products,
                'categories_list' => $categories,
            ]
        );
    }
}
