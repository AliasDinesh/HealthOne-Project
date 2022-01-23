<?php
global $params;

if (!isAdmin()) {
    header("Location:/home");
} else {
    switch ($params[2]) {
        case 'home':
            include_once "../Templates/admin/home.php";
            break;

        case 'products':
            $products = getAllProducts();
            include_once "../Templates/admin/products.php";
            break;

        case 'add':
            if (isset($_POST['addProduct'])) {
                $message = '';
                $result = fileUpload();
                if ($result) {
                    saveProduct($_POST['name'], $_POST['description'], (int)$_POST['categories']);
                    header('Location: /admin/products');
                } else {
                    echo $message;
                    $categories = getCategories();
                    include_once '../Templates/admin/addProduct.php';
                }
            } else {
                $categories = getCategories();
                include_once '../Templates/admin/addProduct.php';
            }
            break;

        case 'delete':
            $products = getProduct($_GET['id']);
            unlink('img/' . $products->picture);
            deleteProduct($_GET['id']);
            $products = getAllProducts();
            include_once '../Templates/admin/products.php';
            break;

        default:
            include_once "../Templates/admin/home.php";
            break;
    }
}
