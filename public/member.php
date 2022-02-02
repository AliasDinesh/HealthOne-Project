<?php
global $params;
global $title;
global $titleSuffix;

if (!isMember()) {
    logOut();
    header("Location:/home");
} else {
    switch ($params[2]) {
        case 'categories':
            $titleSuffix = ' | Categories';
            $categories = getCategories();
            include_once "../Templates/member/categories.php";
            break;

        case 'category':
            $titleSuffix = ' | Category';
            if (isset($_GET['id'])) {
                $categoryId = $_GET['id'];
                $products = getProducts($categoryId);
                $name = getCategoryName($categoryId);
                include_once "../Templates/member/products.php";
            } else {
                $titleSuffix = ' | Home';
                include_once"../Templates/member/home.php";
            }
            break;

        case 'product':
            if (isset($_GET['id'])) {
                $productId = $_GET['id'];
                $product = getProduct($productId);
                $name = getCategoryName($product->category_id);
                $titleSuffix = ' | ' . $product->name;
                include_once "../Templates/member/product.php";
            } else {
                $titleSuffix = ' | Home';
                include_once "../Templates/member/home.php";
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
                    include_once "../Templates/member/product.php";
                }
                //submit form button
                else if (isset($_POST['name']) && !empty($_POST['name'])
                    && isset($_POST['review']) && !empty($_POST['review'])) {
                    saveReview($_POST['name'], $_POST['review'], $_POST['stars']);
                    $reviews = getReviews($productId);
                    $message = $_POST['name'];
                    include_once "../Templates/member/product.php";
                } else {
                    include_once "../Templates/member/review.php";
                }
            } else {
                include_once "../Templates/member/home.php";
            }
            break;

        case 'contact':
            include_once "../Templates/member/contact.php";
            break;

        case 'logout':
            header("Location:/home");
            break;


        default:
            $titleSuffix = ' | Home';
            include_once "../Templates/member/home.php";
            break;
    }
}