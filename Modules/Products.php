<?php
// function to get products from a category
function getProducts(int $categoryId):array
{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM product WHERE category_id=? ');
    $sth->bindParam(1, $categoryId);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product');
}
// function to get one product from products
function getProduct(int $productId):Product
{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM product WHERE id=?');
    $sth->bindParam(1, $productId);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product')[0];
}
// function to get all products
function getAllProducts():array
{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM product ORDER BY category_id');
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product');
}
// function to delete a product
function deleteProduct(int $product_id)
{
    global $pdo;
    $id = filter_var($product_id, FILTER_VALIDATE_INT);
    if ($id != false) {
        $sql = 'DELETE FROM `product` WHERE `id` = :id';
        $stmnt = $pdo->prepare($sql);
        $stmnt->bindParam(':id', $id);
        $stmnt->execute();
    }
}
// function to upload an image file
function fileUpload():string
{
    global $target_file;

    if (isset($_POST['checkfile'])) {
        print_r($_FILES);
    }

    $allowed = ['gif', 'png', 'jpg', 'jpeg'];
    $fileName = $_FILES['userfile']['name'];
    $fileError = $_FILES['userfile']['error'];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed) || exif_imagetype($_FILES['userfile']['tmp_name']) === false) {
        return "INCORRECT";
    }

    $target_dir = 'img/categories/' . strtolower(getCategoryName((int)$_POST['categories'])) . '/';
    $target_file = $_FILES['userfile']['name'];
    $target_file = $target_dir.md5($target_file) . "." .$ext;

    if ($fileError === 0) {
        move_uploaded_file($_FILES['userfile']['tmp_name'], $target_file);
        return "SUCCESS";
    } else {
        return "FAILURE";
    }
}
//function to save a product
function saveProduct(string $name, string $picture, string $description, int $category_id ):void
{
    global $pdo;

    $sth = $pdo->prepare("INSERT INTO product (name, picture, description, category_id) VALUES (?, ?, ?, ?)");
    $sth->bindParam(1, $name);
    $sth->bindParam(2, $picture);
    $sth->bindParam(3, $description);
    $sth->bindParam(4, $category_id);
    $sth->execute();
}




