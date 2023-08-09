<?php

require './data/products_data.php';
require './data/categories_data.php';
require "./data/reviews_data.php";
require "./data/colors_data.php";
require './Models/ProductModel.php';
require './Models/CategoryModel.php';
require './Models/ReviewModel.php';
require './Models/ColorModel.php';

$controllerName = (strtolower($_REQUEST['controller'] ?? 'Home')) . 'Controller';


$actionName = $_REQUEST['action'] ?? 'index';


require "./Controllers/${controllerName}.php";


$controllerObject =  new $controllerName();


$controllerObject->$actionName();
