<?php
// function to add a new member
function makeRegistration():string
{
    global $pdo;
    $email = filter_input(INPUT_POST, 'email1', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password1');
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');

    $sth = $pdo->prepare("SELECT * FROM `user` WHERE email = '$email'");
    $sth->setFetchMode(PDO::FETCH_CLASS, User::class);
    $sth->execute();
    $result = $sth->fetch();
    if ($result->email === $email) {
        return "EXIST";
    } else {
        if ($email !== false && !empty($password) && !empty($first_name) && !empty($last_name)) {
            $sth = $pdo->prepare('INSERT INTO `user` (email, password, first_name, last_name, role) VALUES (?, ?, ?, ?, "member")');
            $sth->bindParam(1, $email);
            $sth->bindParam(2, $password);
            $sth->bindParam(3, $first_name);
            $sth->bindParam(4, $last_name);
            $sth->execute();

        } else {
            return "INCOMPLETE";
        }
        return "SUCCESS";
    }

}
