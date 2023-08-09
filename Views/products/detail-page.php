<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link href='https://fonts.googleapis.com/css?family=Fira Sans' rel='stylesheet'>
    <link href="https://fonts.cdnfonts.com/css/faustina-font" rel="stylesheet">
    <link rel="stylesheet" href="./views/assets/css/detail-page.css">
    <link rel="stylesheet" href="./views/assets/css/header.css">
    <link rel="stylesheet" href="./views/assets/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section class="header">
        <div class="header-top">
            <div class="logo">
                <img src="./views/assets/images/leaves-of-a-plant 1.png" alt="">
                <h1>Plants Shop</h1>
            </div>
            <div class="search-container">
                <form method="GET" action="?controller=product&action=index">
                    <div class="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" placeholder="search" name="search_product" value="<?php echo $search_product ?? '' ?>">
                    </div>
                </form>

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

    <section class="product-detail-container">

        <div class="sub-categories">
            <div class="sub-categories-left">
                <span>Home</span>
                <i class="fa-solid fa-greater-than"></i>
                <span>Product</span>
                <i class="fa-solid fa-greater-than"></i>
                <span class="sub-categories-active"><?php echo $product_detail['name'] ?></span>
            </div>
        </div>

        <div class="product-infor">
            <div class="product-infor-left">
                <div class="sub-images">
                    <img src="" alt="">
                    <img src="./views/assets/images/Rectangle 109.png" alt="">
                    <img src="./views/assets/images/Rectangle 108.png" alt="">
                    <img src="./views/assets/images/Rectangle 107.png" alt="">
                    <img src="./views/assets/images/Rectangle 106.png" alt="">
                </div>
                <div class="head-image">
                    <img src="<?php echo $product_detail['image'] ?>" alt="">
                </div>
            </div>

            <div class="product-infor-right">
                <p class="infor-indoor">
                    <?php
                    foreach ($categories as $category) {
                        if ($category['category_id'] == $product_detail['category_id'])
                            $category_name = $category['name'];
                    }
                    echo $category_name;
                    ?>
                </p>
                <p class="infor-name"><?php echo $product_detail['name'] ?></p>
                <p class="infor-price"><?php echo '$' . $product_detail['price'] . ".00" ?></p>
                <div class="infor-reviews">
                    <?php for ($i = 0; $i < $rate; $i++) { ?>
                        <img src="./views/assets/images/star 3.png" alt="">
                    <?php } ?>
                    <span class="stars-num"><?php echo $rate ?>/5</span>
                    <span class="reviews-num">(20 reviews)</span>
                </div>
                <div class="potter">
                    <p class="potter-text">Potter Color :</p>
                    <div class="potter-color">
                        <svg xmlns="http://www.w3.org/2000/svg" width="300" height="30" viewBox="0 0 230 20" fill="none">
                            <circle cx="10" cy="10" r="10" fill="black" fill-opacity="0.7" />
                            <circle cx="50" cy="10" r="10" fill="#FBD3C4" />
                            <circle cx="90" cy="10" r="10" fill="#D17463" />

                        </svg>
                    </div>

                </div>
                <div class="bio">
                    <p class="plant">Plant Bio: </p>
                    <p class="desc"><?php echo $product_detail['description'] ?></p>
                </div>
                <div class="overview-weather">
                    <p class="overview-text">Overview</p>
                    <div class="weather">
                        <div class="child-weather">
                            <img src="./views/assets/images/clean-water 1.png" alt="">
                            <div class="weather-infor">
                                <p>250ml</p>
                                <span>water</span>
                            </div>
                        </div>
                        <div class="child-weather">
                            <img src="./views/assets/images/sun 1.png" alt="">
                            <div class="weather-infor">
                                <p>35-40%</p>
                                <span>light</span>
                            </div>
                        </div>
                        <div class="child-weather">
                            <img src="./views/assets/images/sesame 1.png" alt="">
                            <div class="weather-infor">
                                <p>250gm</p>
                                <span>fertilizer</span>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="add-to-cart">Add to cart</button>
            </div>
        </div>

        <div class="related-product">
            <div class="related-header">
                <p>Related Products</p>
                <span>View more</span>
            </div>
        </div>

        <div class="product-lists">
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

                            $category_name = "";
                            foreach ($categories as $category) {
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
    </section>
    <?php require_once "./views/partials/footer.php" ?>
</body>

</html>