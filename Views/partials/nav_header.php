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
        <?php if (!isset($_SESSION['user'])) { ?>
            <div>
                <a href="?controller=auth&action=login">Login</a>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['user'])) { ?>
            <div>
                <a href="?controller=auth&action=logout">Logout</a>
            </div>
        <?php } ?>
        <span class="greeting">Hi, <?php
                                    if (isset($_SESSION['user']))
                                        echo explode("@", $_SESSION['user']['email'])[0];
                                    ?></span>
    </div>
</div>