<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Fira Sans' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./views/assets/css/home-page.css">
    <link rel="stylesheet" href="./views/assets/css/footer.css">
    <link rel="stylesheet" href="./views/assets/css/header.css">
    <title>Home Page</title>
</head>

<body>
    <section class="header">
        <div class="header-top">
            <div class="logo">
                <img src="./views/assets/images/leaves-of-a-plant 1.png" alt="">
                <h1>Plants Shop</h1>
            </div>
            <div class="search-container">
                <form method="GET" action="?controller=home&action=index">
                    <div class="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" placeholder="search" name="product_name" id="product_name" value="<?php echo $product_name ?? '' ?>">
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
            <li><a href="?controller=home" class="active">Home</a></li>
            <li><a href="?controller=product">Categories</a></li>
            <li><a href="#">Cart</a></li>
            <li><a href="#">Favorite</a></li>
        </ul>
    </section>

    <?php require_once "./views/partials/banner.php" ?>

    <section id="categories">
        <div class="categories-text">
            <p>Categories</p>
        </div>
        <div class="categories-container">
            <div class="indoor-plant">
                <p class="indoor-outdoor-plant-text">Indoor plants</p>
            </div>

            <div class="outdoor-plant">
                <p class="indoor-outdoor-plant-text">Outdoor plants</p>
            </div>

            <div class="holiday-office">
                <div class="holiday-container">
                    <div class="holiday">
                        <div class="holiday-text">
                            <p class="holiday-header">The Holiday
                                Collection</p>
                            <p class="holiday-sub-text">Discover our curated collection of holiday plants, trees, ....
                            </p>
                            <button class="holiday-view-item">View Item</button>
                        </div>
                        <div class="holiday-image">
                            <img src="./views/assets/images/905123457.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="office">
                    <div class="office-text">
                        <p>Office Plants</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <div class="sale-off-container">
        <div class="sale-left">
            <img src="./views/assets/images/30 1.png" alt="">
        </div>
        <div class="sale-middle">
            <div class="sale-frame">
                <span>Sale Off</span>
            </div>
        </div>
        <div class="sale-right">
            <img src="./views/assets/images/31 1.png" alt="">
        </div>
    </div>

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
                        $category_name = "";
                        foreach ($categories_list as $category) {
                            if ($category['category_id'] == $product['category_id'])
                                $category_name = $category['name'];
                        }
                        ?>
                        <p class="indoor-and-from"><?php echo $category_name ?></p>
                        <a href="./detail-page.php?pid=<?php echo $product['product_id']  ?>" class="product-name"><?php echo $product['name']; ?></a>
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

    <?php require_once "./views/partials/footer.php" ?>
</body>

</html>