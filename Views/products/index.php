<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Page </title>
    <link rel="stylesheet" href="./views/assets/css/category-page.css">
    <link rel="stylesheet" href="./views/assets/css/header.css">
    <link rel="stylesheet" href="./views/assets/css/footer.css">
    <link href='https://fonts.googleapis.com/css?family=Fira Sans' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <section class="header">
        <div class="header-top">
            <div class="logo">
                <img src="./views/assets/images/leaves-of-a-plant 1.png" alt="">
                <h1>Plants Shop</h1>
            </div>
            <div class="search-container">

                <div class="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="search" name="product_name" id="product_name" value="<?php echo $product_name ?? '' ?>">
                </div>

            </div>
            <div class="header-icons">
                <div class="option">
                    <img src="./views/assets/images/Like 2.png" alt="">
                </div>
                <div class="option">
                    <img src="./views/assets/images/btn_add_Cart.png" alt="">
                </div>
                <div class="option">
                    <img src="./views/assets/images/woman 1.png" alt="">
                </div>
                <span class="greeting">Hi,</span>
            </div>
        </div>
        <ul class="navbar">
            <li><a href="?controller=home">Home</a></li>
            <li><a href="?controller=product" class="active">Categories</a></li>
            <li><a href="#">Cart</a></li>
            <li><a href="#">Favorite</a></li>
        </ul>
    </section>

    <?php
    require_once "./views/partials/banner.php";
    // var_dump(__DIR__);
    ?>

    <!-- Products -->
    <div class="categories-container">
        <div class="product-options">
            <div class="product-options-left">
                <span>Home</span>
                <i class="fa-solid fa-greater-than"></i>
                <span>Product</span>
                <i class="fa-solid fa-greater-than"></i>
                <span class="product-options-active">Indoor</span>
            </div>
            <div class="product-options-right">
                <p>Price Range: </p>
                <span>Min - Max</span>
                <div class="view">
                    <span>View</span>
                    <img src="./views/assets/images/category 1.png" alt="">
                </div>
            </div>
        </div>

        <div class="products">
            <div class="product-left">
                <div class="product-color">
                    <input type="hidden" value="<?php echo implode(",", $colors_name) ?>" id="color_array">
                    <p>Potter Color:</p>
                    <ul class="color">
                        <?php foreach ($colors_name as $item) { ?>
                            <li value="<?php echo $item ?>" class="color_select"></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="product-size">
                    <p>Size:</p>
                    <div class="size-container">
                        <div class="size">
                            <input type="checkbox" class="size_filter" value="large" id="size_large" <?php
                                                                                                        if (isset($_GET['sizes']) && str_contains($_GET['sizes'], 'large'))
                                                                                                            echo 'checked';
                                                                                                        ?>>
                            <label>Large</label>
                        </div>
                        <div class="size ">
                            <input type="checkbox" class="size_filter" value="medium" id="size_medium" <?php
                                                                                                        if (isset($_GET['sizes']) && str_contains($_GET['sizes'], 'medium'))
                                                                                                            echo 'checked';
                                                                                                        ?>>
                            <label>Medium</label>
                        </div>
                        <div class="size">
                            <input type="checkbox" class="size_filter" value="small" id="size_small" <?php
                                                                                                        if (isset($_GET['sizes']) && str_contains($_GET['sizes'], 'small'))
                                                                                                            echo 'checked';
                                                                                                        ?>>
                            <label>Small</label>
                        </div>
                    </div>
                </div>
                <div class="filter-price">
                    <p>Price Range:</p>
                    <div class="price">
                        <form method="GET" id="price_form">
                            <input type="number" placeholder="Min" name="min-price" value="<?php echo $_GET['min_price'] ?? '' ?>" id="min_price">
                            <span class="range-line">-</span>
                            <input type="number" placeholder="Max" name="max-price" value="<?php echo $_GET['max_price'] ?? '' ?>" id="max_price">
                            <button type="button" id="btn-price"><i class="fa-solid fa-greater-than"></i></button>
                        </form>
                    </div>
                </div>
                <div class="product-review">
                    <p>Reviews:</p>
                    <div class="review-container">
                        <div class="review" id="5">
                            <img src="./views/assets/images/star 3.png" alt="">
                            <img src="./views/assets/images/star 3.png" alt="">
                            <img src="./views/assets/images/star 3.png" alt="">
                            <img src="./views/assets/images/star 3.png" alt="">
                            <img src="./views/assets/images/star 3.png" alt="">
                        </div>
                        <div class="review" id="4">
                            <img src="./views/assets/images/star 3.png" alt="">
                            <img src="./views/assets/images/star 3.png" alt="">
                            <img src="./views/assets/images/star 3.png" alt="">
                            <img src="./views/assets/images/star 3.png" alt="">
                            <img src="./views/assets/images/star 5.png" alt="">
                        </div>
                        <div class="review" id="3">
                            <img src="./views/assets/images/star 3.png" alt="">
                            <img src="./views/assets/images/star 3.png" alt="">
                            <img src="./views/assets/images/star 3.png" alt="">
                            <img src="./views/assets/images/star 5.png" alt="">
                            <img src="./views/assets/images/star 5.png" alt="">
                        </div>
                        <div class="review" id="2">
                            <img src="./views/assets/images/star 3.png" alt="">
                            <img src="./views/assets/images/star 3.png" alt="">
                            <img src="./views/assets/images/star 5.png" alt="">
                            <img src="./views/assets/images/star 5.png" alt="">
                            <img src="./views/assets/images/star 5.png" alt="">
                        </div>
                        <div class="review" id="1">
                            <img src="./views/assets/images/star 3.png" alt="">
                            <img src="./views/assets/images/star 5.png" alt="">
                            <img src="./views/assets/images/star 5.png" alt="">
                            <img src="./views/assets/images/star 5.png" alt="">
                            <img src="./views/assets/images/star 5.png" alt="">
                        </div>
                    </div>
                </div>
                <img src="./views/assets/images/image 1.png" alt="" class="banner-product">
            </div>
            <div class="product-right">
                <div class="product-container">
                    <?php
                    foreach ($products_list as $product) {
                    ?>
                        <div class="product-card">
                            <div class="product-img">
                                <i class="fa-regular fa-heart"></i>
                                <a href="?controller=product&action=show&pid=<?php echo $product['product_id']  ?>"><img src="<?php echo $product['image']; ?>" alt=""></a>
                            </div>
                            <div class="product-detail">
                                <div class="detail">
                                    <?php
                                    foreach ($categories_list as $category) {
                                        if ($category['category_id'] == $product['category_id'])
                                            $category_name = $category['name'];
                                    }
                                    ?>
                                    <p class="indoor-and-from"><?php echo $category_name ?></p>
                                    <a href="?controller=product&action=show&pid=<?php echo $product['product_id']  ?>" class="product-name"><?php echo $product['name']; ?></a>
                                    <p class="indoor-and-from">from</p>
                                    <p class="product-price"><?php echo '$' . $product['price'] . ".00" ?></p>
                                </div>
                                <div class="product-add">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                        <circle cx="15" cy="15" r="15" fill="#40CA68" />
                                        <line x1="8" y1="15" x2="22" y2="15" stroke="white" stroke-width="2" />
                                        <line x1="15" y1="8" x2="15" y2="22" stroke="white" stroke-width="2" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="pagination">
                    <ul class="pagination">
                        <li class="active-pagination">1</li>
                        <li>2</li>
                        <li>3</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php require_once "./views/partials/footer.php"  ?>
    <script>
        $(document).ready(function() {
            $('#product_name').on("change", function() {
                var query = $(this).val();
                const params = new URLSearchParams(window.location.search);
                params.set("product_name", query);
                window.location.search = params.toString();
                localStorage.setItem("product_name", query);
            });

            $('#btn-price').click(function() {
                const params = new URLSearchParams(window.location.search);
                params.set("min_price", $('#min_price').val());
                params.set("max_price", $('#max_price').val());
                window.location.search = params.toString();
            });

            
        });
    </script>
</body>

</html>