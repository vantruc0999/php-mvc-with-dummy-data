<!-- Khi người dùng vào "Categories" trên UI thì controller này sẽ được gọi với hàm mặc định là index-->
<?php

class ProductController
{
    private $productModel, $categoryModel, $reviewModel, $colorModel, $colorProductModel;

    public function __construct()
    {
        $this->productModel = new ProductModel;
        $this->categoryModel = new CategoryModel;
        $this->reviewModel = new ReviewModel;
        $this->colorModel = new ColorModel;
        $this->colorProductModel = new ColorProductModel;
    }

    // Sử dụng khái niệm biến biến để biến key của một mảng thành một biến mới với giá trị đã được gán
    private function view($viewPath, array $data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        //Thay vì truyền vào biến $viewpath = "Views/tên_folder.php/tênfile.php" thì đổi kiểu này cho giống laravel 
        return require('Views' . '/' . str_replace('.', '/', $viewPath) . '.php');
    }

    // Lấy danh sách các id của product bằng điểm review (1->5)
    private function getProductIdByReview($review)
    {
        $reviews_list = $this->reviewModel->getAllProductReviews();
        $product_id_list = array();

        foreach ($reviews_list as $item) {
            if ($item['rate'] == $review) {
                $product_id_list[] = $item['product_id'];
            }
        }

        return $product_id_list;
    }

    // Lấy danh sách id sản phẩm có màu là tham số $color(Mã màu người dùng cần lọc)
    private function getProductByColorName($color)
    {
        $color_id = "";
        $product_id_list = array();
        // Lấy data trong table colors_products_list
        $colors_products_list = $this->colorProductModel->getAllColorsProducts();
        // Lấy toàn bộ màu có trong data/colors
        $colors = $this->colorModel->getAllColors();

        // Lấy ra danh sách id màu theo tên màu là tham số $color
        foreach ($colors as $item) {
            if (strcmp(strtolower($item['color_name']), strtolower($color)) == 0) {
                $color_id = $item['id'];
            }
        }

        /* 
            Khi đã có mã màu ứng với màu người dùng cần thì ta có thể lấy ra những sản phẩm
            có id ứng với màu đó qua bảng trung gian colors_products_data 
         */
        foreach ($colors_products_list as $each) {
            if ($each['color_id'] == $color_id) {
                $product_id_list[] = $each['product_id'];
            }
        }

        return  $product_id_list;
    }

    //Lấy tên tất cả màu có trong data để đổ ra trang sản phẩm
    private function getColorName($colors_list)
    {
        $colors_name = array();
        foreach ($colors_list as $item) {
            $colors_name[] = $item['color_name'];
        }
        return $colors_name;
    }

    // Trả về tên màu theo mã màu hàm này được dùng để đỗ màu ra trong trang danh sách sản phẩm
    private function getColorNameByColorId($color_id)
    {
        $colors = $this->colorModel->getAllColors();
        foreach ($colors as $color) {
            if ($color['id'] == $color_id) {
                return $color['color_name'];
            }
        }
    }

    // Hàm này được dùng trong chi tiết sản phẩm để lấy ra màu của sản phẩm
    private function getColorNamebyProductId($product_id)
    {
        $res = array();
        $color_id_list = array();
        $colors_products = $this->colorProductModel->getAllColorsProducts();

        foreach ($colors_products as $item) {
            if ($item['product_id'] == $product_id)
                $color_id_list[] = $item['color_id'];
        }

        foreach ($color_id_list as $item) {
            $res[] = $this->getColorNameByColorId($item);
        }

        return $res;
    }

    private function getReviewsByProductId($product_id)
    {
        $reviews_list = $this->reviewModel->getAllProductReviews();

        foreach ($reviews_list as $item) {
            if ($item['product_id'] == $product_id)
                $rate = $item['rate'];
        }

        return $rate;
    }

    // Hàm để xử lý lọc sản phẩm
    private function filterProduct($key, $values, $products_list)
    {
        $res = array();
        foreach ($products_list as $product) {
            switch ($key) {
                case 'product_name':
                    if (str_contains(strtolower($product['name']), strtolower($values[0])))
                        $res[] = $product;
                    break;
                case 'price':
                    if ($product['price'] > $values[0] && $product['price'] < $values[1])
                        $res[] = $product;
                    break;
                case 'size':
                    foreach ($values as $item) {
                        if (strcmp(strtolower($product['size']), strtolower($item)) == 0)
                            $res[] = $product;
                    }
                    break;
                case 'review':
                    foreach ($values as $item) {
                        if ($item == $product['product_id'])
                            $res[] = $product;
                    }
                    break;
                case 'color':
                    $products_color = $this->getProductByColorName($values[0]);
                    foreach ($products_color as $item) {
                        if ($product['product_id'] == $item) {
                            $res[] = $product;
                        }
                    }
                    break;
            }
        }
        return $res;
    }

    public function index()
    {
        $products = $this->productModel->getAllProducts();
        $categories = $this->categoryModel->getAllCategories();

        $colors_list = $this->colorModel->getAllColors();
        $colors_name = $this->getColorName($colors_list);

        $products_list = array();

        // Get product name from search bar
        $product_name = $_GET['product_name'] ?? "";

        // Get min range
        $min_price = $_GET['min_price'] ?? "";
        $max_price = $_GET['max_price'] ?? "";

        // Get product size
        $sizes = $_GET['sizes'] ?? "";

        // Get review
        $review = $_GET['review'] ?? "";

        // Get color

        $color = $_GET['color'] ?? "";

        // Start filter
        $products_list = $products;

        if ($product_name) {
            $products_list = $this->filterProduct('product_name', [$product_name], $products_list);
        }

        if ($min_price) {
            $products_list = $this->filterProduct('price', [$min_price, $max_price], $products_list);
        }

        if ($sizes) {
            $sizes = explode(",", $sizes);
            $products_list = $this->filterProduct('size', $sizes, $products_list);
        }

        if ($review) {
            $product_id_reviews = $this->getProductIdByReview($review);
            $products_list = $this->filterProduct('review', $product_id_reviews, $products_list);
        }

        if ($color) {
            $products_list = $this->filterProduct('color', [$color], $products_list);
        }

        // $product_color = $this->getProductByColorName($color);

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


    // Lấy chi tiết sản phẩm
    public function show()
    {
        $product_id = $_GET['pid'] ?? "";

        $products = $this->productModel->getAllProducts();
        $categories = $this->categoryModel->getAllCategories();

        if (!$product_id) {
            return $this->view(
                'index',
                [
                    'products_list' => $products,
                    'categories_list' => $categories,
                ]
            );
        }

        $product_detail = $this->productModel->getDetailProduct($product_id);

        $rate = $this->getReviewsByProductId($product_id);

        $color_list = $this->getColorNamebyProductId($product_id);

        return $this->view(
            'products.detail-page',
            [
                'product_detail' => $product_detail,
                'categories' => $categories,
                'products_list' => $products,
                'rate' => $rate,
                'color_name_list' => $color_list,
            ]
        );
    }
}
