<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>
<body>
<div class="container">
    <?php
    include_once ('defaults/header.php');
    include_once ('defaults/menu.php');
    include_once ('defaults/pictures.php');
    ?>
    <h4>Member Profile</h4>
    <table class="table align-middle">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Email</td>
            <td><?=$_SESSION['user']->email?></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><?=$_SESSION['user']->first_name?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><?=$_SESSION['user']->last_name?></td>
        </tr>
        </tbody>
    </table>
    <a type="button" class="btn btn-success btn-sm px-3" href="/member/editProfile">Profile aanpassen</a>
    <a type="button" class="btn btn-danger btn-sm px-3" href="/member/changePassword">Password aanpassen</a>
    <hr>
    <?php
    include_once ('defaults/footer.php');
    ?>
</div>
</body>
</html>

