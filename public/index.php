<?php
require '../Modules/Categories.php';
require '../Modules/Products.php';
require '../Modules/Database.php';
require '../Modules/Review.php';
require '../Modules/Login.php';

session_start();
$request = $_SERVER['REQUEST_URI'];
$params = explode("/", $request);
$title = "HealthOne";
$titleSuffix = "";

switch ($params[1]) {
    case 'categories':
        $titleSuffix = ' | Categories';
        $categories = getCategories();
        include_once"../Templates/categories.php";
        break;

    case 'category':
        $titleSuffix = ' | Category';
        if (isset($_GET['id'])) {
            $categoryId = $_GET['id'];
            $products = getProducts($categoryId);
            $name = getCategoryName($categoryId);
            include_once "../Templates/products.php";
        } else {
            $titleSuffix = ' | Home';
            include_once"../Templates/home.php";
        }
        break;

    case 'product':
        if (isset($_GET['id'])) {
            $productId = $_GET['id'];
            $product = getProduct($productId);
            $name = getCategoryName($product->category_id);
            $titleSuffix = ' | ' . $product->name;
            include_once "../Templates/product.php";
        } else {
            $titleSuffix = ' | Home';
            include_once "../Templates/home.php";
        }
        break;

    case 'review':
        if (isset($_GET['id'])) {
            $productId = $_GET['id'];
            $product = getProduct($productId);
            $reviews = getReviews($productId);
            $name = getCategoryName($product->category_id);
            $titleSuffix = ' | Review' . $product->name;
            //close button
            if (isset($_POST['close'])) {
                include_once "../Templates/product.php";
            }
            //submit form button
            else if (isset($_POST['name']) && !empty($_POST['name'])
                && isset($_POST['review']) && !empty($_POST['review'])) {
                 saveReview($_POST['name'], $_POST['review'], $_POST['stars']);
                 $reviews = getReviews($productId);
                 $message = $_POST['name'];
                 include_once "../Templates/product.php";
            } else {
                include_once "../Templates/review.php";
            }
        } else {
            include_once "../Templates/home.php";
        }
        break;

    case 'login':
        $titleSuffix = ' | Login';
        if (isset($_POST['login'])) {
            $result = checkLogin();
            switch ($result) {
                case 'ADMIN':
                    header("Location: /admin/home");
                    //include_once "../Templates/admin/home.php";
                    break;
                case 'MEMBER':
                    break;
                case 'FAILURE':
                    $message = "Email of password is niet correct ingevuld!";
                    include_once "../Templates/login.php";
                    break;
                case 'INCOMPLETE':
                    $message = "Formulier is niet volledig ingevuld";
                    include_once "../Templates/login.php";
                    break;
            }
        } else {
            include_once "../Templates/login.php";
        }
        break;

    case 'admin':
        include_once ('admin.php');
        break;

    case 'contact':
        include_once "../Templates/contact.php";
        break;
    default:
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
}

function getTitle() {
    global $title, $titleSuffix;
    return $title . $titleSuffix;
}
