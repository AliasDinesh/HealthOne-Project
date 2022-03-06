<?php
// function to change a members profile
function changeProfile():bool
{
    global $pdo;

    $email = $_SESSION['user']->email;
    $firstName = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastName = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!empty($firstName) && !empty($lastName)) {
        $sth = $pdo->prepare('UPDATE `user` SET `first_name` = ?, `last_name` = ? WHERE `email` = ?');
        $sth->bindParam(1, $firstName);
        $sth->bindParam(2, $lastName);
        $sth->bindParam(3, $email);
        $sth->execute();

        $_SESSION['user']->first_name = $firstName;
        $_SESSION['user']->last_name = $lastName;
        return true;
    } else {
        return false;
    }
}
// function to change a members password
function changePassword():string
{
    global $pdo;

    $email = $_SESSION['user']->email;
    $password = $_SESSION['user']->password;
    $inputPassword = filter_input(INPUT_POST, "inputPassword");
    $newPassword = filter_input(INPUT_POST, "newPassword");
    $repeatPassword = filter_input(INPUT_POST, "repeatPassword");

    if (!empty($inputPassword) && !empty($newPassword) && !empty($repeatPassword)) {
        if ($password === $inputPassword) {
            $options = [
                'cost' => 12,
            ];
            $hash = password_hash($newPassword, PASSWORD_BCRYPT, $options);
            if (password_verify($repeatPassword, $hash)) {
                $sth = $pdo->prepare('UPDATE `user` SET `password` = ? WHERE `email` = ?');
                $sth->bindParam(1, $newPassword);
                $sth->bindParam(2, $email);
                $sth->execute();

                $_SESSION['user']->password = $newPassword;
                return "SUCCES";
            } else {
                return "FAILURE";
            }
        }
        return "INCORRECT";
    }
    return "INCOMPLETE";
}