<?php
function getProducts(int $categoryId):array
{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM product WHERE category_id=? ');
    $sth->bindParam(1, $categoryId);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product');
}

function getProduct(int $productId):Product
{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM product WHERE id=?');
    $sth->bindParam(1, $productId);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product')[0];
}

function getAllProducts():array
{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM product ORDER BY category_id');
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Product');
}

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

function fileUpload()
{
    if (isset($_POST['checkfile'])) {
        print_r($_FILES);
    }

    global $message;

    $allowed = ['gif', 'png', 'jpg', 'jpeg'];
    $fileName = $_FILES['userfile']['name'];
    $fileError = $_FILES['userfile']['error'];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed) || exif_imagetype($_FILES['userfile']['tmp_name']) === false) {
        $message = "Sorry alleen gif, png of jpeg files zijn toegestaan";
    }

    $target_dir = '/categories/' . strtolower(getCategoryName((int)$_POST['categories'])) . '/';
    $target_file = $_FILES['userfile']['name'];

    do {
        $target_file = $target_dir . basename($target_file);
    } while (file_exists($target_file));

    if ($fileError === 0) {
        move_uploaded_file($_FILES['userfile']['tmp_name'], $target_file);
        $message.= "Upload is gelukt, bestandsnaam is " . $target_file;
        return $target_file;
    } else {
        $message.= "Sorry, upload is niet gelukt ". $target_file;
    }
}

function saveProduct(string $name, string $description, int $category_id ):void
{
    global $pdo;
    $picture = fileUpload();
    $sth = $pdo->prepare("INSERT INTO product (name, picture, description, category_id) VALUES (?, ?, ?, ?)");
    $sth->bindParam(1, $name);
    $sth->bindParam(2, $picture);
    $sth->bindParam(3, $description);
    $sth->bindParam(4, $category_id);
    $sth->execute();
}




