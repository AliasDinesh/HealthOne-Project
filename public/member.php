<?php
global $params;
global $title;
global $titleSuffix;

if (!isMember()) {
    logOut();
    header("Location:/home");
    //include_once "../Templates/home.php";
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
                else if (isset($_POST['review']) && !empty($_POST['review'])) {
                    saveReviewMember($_POST['review'], $_POST['stars']);
                    $reviews = getReviews($productId);
                    $message = $_SESSION['user']->first_name;
                    include_once "../Templates/member/product.php";
                } else {
                    include_once "../Templates/member/review.php";
                }
            } else {
                include_once "../Templates/member/home.php";
            }
            break;

        case 'profile':
            $titleSuffix = ' | Profile';
            include_once "../Templates/member/profile.php";
            break;

        case 'editProfile':
            $titleSuffix = ' | Profile';
            if (isset($_POST['profile'])) {
                $profile = changeProfile();
                if ($profile === true) {
                    header("Location: /member/profile");
                    //include_once "../Templates/member/profile.php";
                } else {
                    $message = "Niet alle velden correct ingevuld";
                    include_once "../Templates/member/editProfile.php";
                }
                break;
            } else {
                include_once "../Templates/member/editProfile.php";
            }
            break;

        case 'changePassword':
            $titleSuffix = ' | Password';
            if (isset($_POST['password'])) {
                $password = changePassword();
                switch ($password) {
                    case "SUCCES":
                        header("Location: /member/profile");
                        //include_once "../Templates/member/profile.php";
                        break;
                    case "FAILURE":
                        $message = "Herhaal password is fout!";
                        include_once "../Templates/member/changePassword.php";
                        break;
                    case "INCORRECT":
                        $message = "Huidige password is fout";
                        include_once "../Templates/member/changePassword.php";
                        break;
                    case "INCOMPLETE":
                        $message = "Niet alle velden correct ingevuld";
                        include_once "../Templates/member/changePassword.php";
                        break;
                }

            } else {
                include_once "../Templates/member/changePassword.php";
            }
            break;

        case 'contact':
            $times = getOpeningTimes();
            include_once "../Templates/member/contact.php";
            break;

        case 'logout':
            header("Location:/home");
            //include_once "../Templates/home.php";
            break;


        default:
            $titleSuffix = ' | Home';
            include_once "../Templates/member/home.php";
            break;
    }
}