<?php

function getCategories()
{
    global $pdo;
    $categories = $pdo->query('SELECT * FROM category')->fetchAll(PDO::FETCH_CLASS, 'Category');
    return $categories;
}

function getCategoryName(int $id):string
{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM category WHERE id = ?');
    $sth->bindParam(1, $id, PDO::PARAM_INT);
    $sth->setFetchMode(PDO::FETCH_CLASS, Category::class);
    $sth->execute();
    $category = $sth->fetch();
    return $category->name;
}
