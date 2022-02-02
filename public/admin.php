<?php
global $params;
global $title;
global $titleSuffix;

if (!isAdmin()) {
    logOut();
    header("Location:/home");
} else {
    switch ($params[2]) {
        case 'products':
            $products = getAllProducts();
            $titleSuffix = ' | Beheer';
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
                    $titleSuffix = ' | Add';
                    include_once '../Templates/admin/addProduct.php';
                }
            } else {
                $categories = getCategories();
                $titleSuffix = ' | Add';
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

        case 'logout':
            header("Location: /home");
            break;

        default:
            include_once "../Templates/admin/home.php";
            break;
    }
}
