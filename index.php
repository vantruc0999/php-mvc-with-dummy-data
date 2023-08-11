<!-- index.php hoạt động như một router-->
<?php
session_start();
require './data/products_data.php';
require './data/categories_data.php';
require "./data/reviews_data.php";
require "./data/colors_data.php";
require "./data/users_data.php";
require "./data/colors_products_data.php";

require './Models/ProductModel.php';
require './Models/CategoryModel.php';
require './Models/ReviewModel.php';
require './Models/ColorModel.php';
require './Models/UserModel.php';
require './Models/ColorProductModel.php';

//Lấy tên của controller từ url nếu không tồn tại thì cho mặc định là hom
$controller = (strtolower($_REQUEST['controller'] ?? 'Home'));

//Tạo biến này để lát sau khởi tạo object (ví dụ HomeController, ProductController)
$controllerName = $controller . 'Controller';

// Trong một controller thì có nhiều hàm, lấy action để biết sử dụng hàm nào trong controller nếu k có thì để index làm hàm mặc định
$actionName = $_REQUEST['action'] ?? 'index';

// var_dump($_SESSION['user'], $controllerName, $actionName);

//Sau khi người dùng đã đăng nhập thì set giá trị cho controller và action tới trang home
if ($controller == 'auth' && $actionName == 'login' && isset($_SESSION['user'])) {
    $controllerName = 'homeController';
    $actionName = 'index';
}

/*Dùng hàm này để kiểm tra xem người dùng đã đăng nhập chưa, nếu chưa thì dùng tham chiếu đặt controller
 và action để người dùng tới trang đăng nhập*/

function checkLogin(&$controllerName, &$actionName)
{
    if (!isset($_SESSION['user'])) {
        $controllerName = 'authController';
        $actionName = 'login';
    }
}

// Kiểm tra những controller nào action nào thì khác chưa có account không thể vào
switch($controller){
    case 'product':
            switch($actionName){
                case 'index':
                case 'show':
                    checkLogin($controllerName, $actionName);
                    break;
            }
            break;
}

// Gọi controller theo request
require "./Controllers/${controllerName}.php";

// Khởi tạo đối tượng controller
$controllerObject =  new $controllerName();

//Thực hiện action của controller
$controllerObject->$actionName();

/*
Nếu người dùng lần đầu vào trang web (không có controller hay action) thì HomeController.php 
và hàm index trong controller này sẽ được gọi
*/
