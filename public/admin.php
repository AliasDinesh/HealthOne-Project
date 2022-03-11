<?php
global $params;
global $title;
global $titleSuffix;

if (!isAdmin()) {
    logOut();
    header("Location:/home");
    //include_once "../Templates/home.php";
} else {
    switch ($params[2]) {
        case 'products':
            $products = getAllProducts();
            $titleSuffix = ' | Beheer';
            include_once "../Templates/admin/products.php";
            break;

        case 'add':
            $target_file = "";
            if (isset($_POST['addProduct'])) {
                $result = fileUpload();
                switch($result) {
                    case "SUCCESS":
                        $message = "Upload is gelukt";
                        $products = getAllProducts();
                        saveProduct($_POST['name'], $target_file, $_POST['description'], (int)$_POST['categories']);
                        include_once "../Templates/admin/products.php";
                        break;
                    case "INCORRECT":
                        $categories = getCategories();
                        $message = "Sorry alleen gif, png of jpeg files zijn toegestaan";
                        $titleSuffix = ' | Add';
                        include_once '../Templates/admin/addProduct.php'; 
                        break;
                    case "FAILURE":
                        $categories = getCategories();
                        $message = "Sorry, upload is niet gelukt";
                        $titleSuffix = ' | Add';
                        include_once '../Templates/admin/addProduct.php'; 
                        break;

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
