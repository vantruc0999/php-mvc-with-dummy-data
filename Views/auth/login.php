<?php
// if (isset($error)) echo $error;
// if(isset($_SESSION['user'])) require_once ""; 
?>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        form {
            padding: 20px 450px;
        }
    </style>
</head>
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
            </div>
        </div>
        <ul class="navbar">
            <li><a href="?controller=home">Home</a></li>
            <li><a href="?controller=product" class="active">Categories</a></li>
            <li><a href="#">Cart</a></li>
            <li><a href="#">Favorite</a></li>
        </ul>
    </section>
    <section>
        <form action="?controller=auth&action=loginProcess" method="POST">
            <?php if (isset($error)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php } ?>
            <h1>Login form</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-success">Login</button>
        </form>
    </section>
    <?php require_once "./views/partials/footer.php"  ?>

</body>

</html>