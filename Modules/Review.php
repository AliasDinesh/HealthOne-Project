<?php
// function to get reviews
function getReviews(int $id):array
{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM review WHERE product_id =(SELECT id FROM product WHERE id =?) order by date DESC ');
    $sth->bindParam(1, $id);
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'Review');

}
// function to save a review
function saveReview(string $name, string $review, string $stars):void
{
    global $pdo, $product;
    $sth = $pdo->prepare('SELECT * FROM review WHERE name = ? AND description = ?');
    $sth->bindParam(1, $name);
    $sth->bindParam(2, $review);
    $sth->execute();
    if (count($sth->fetchAll(PDO::FETCH_CLASS, 'Product'))==0) {
        $sth = $pdo->prepare('INSERT INTO review (name, date, description, stars, product_id) VALUES (?, current_date(), ?, ?, ?)');
        $sth->bindParam(1, $name);
        $sth->bindParam(2, $review);
        $sth->bindParam(3, $stars);
        $sth->bindParam(4, $product->id);
        $sth->execute();
    }

}
// function to save a members review
function saveReviewMember(string $review, string $stars):void
{
    global $pdo, $product;
    $name = $_SESSION['user']->first_name;
    $sth = $pdo->prepare('SELECT * FROM review WHERE name = ? AND description = ?');
    $sth->bindParam(1, $name);
    $sth->bindParam(2, $review);
    $sth->execute();
    if (count($sth->fetchAll(PDO::FETCH_CLASS, 'Product'))==0) {
        $sth = $pdo->prepare('INSERT INTO review (name, date, description, stars, product_id) VALUES (?, current_date(), ?, ?, ?)');
        $sth->bindParam(1, $name);
        $sth->bindParam(2, $review);
        $sth->bindParam(3, $stars);
        $sth->bindParam(4, $product->id);
        $sth->execute();
    }

}

