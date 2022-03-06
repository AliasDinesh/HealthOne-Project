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
    <?php if (!empty($message)): ?>
        <div class="alert alert-success" role="alert">
            <?=$message?>
        </div>
    <?php endif;?>

    <form class="row g-3" method="post">
        <div class="col-md-12">
            <label for="inputPassword" class="form-label">Huidige password</label>
            <input type="password" name="inputPassword" class="form-control" id="inputPassword">
        </div>
        <div class="col-md-12">
            <label for="inputNewPassword" class="form-label">Nieuw password</label>
            <input type="password" name="newPassword" class="form-control" id="inputNewPassword">
        </div>
        <div class="col-md-12">
            <label for="inputNewPassword" class="form-label">Herhaal password</label>
            <input type="password" class="form-control" name="repeatPassword" id="inputNewPassword">
        </div>
        <div class="col-12">
            <button type="submit" name="password" class="btn btn-primary">Aanpassen password</button>\
            <a type="button" class="btn btn-danger btn-sm px-3" href="/member/profile">Close</a>
        </div>
    </form>
    <hr>
    <?php
    include_once ('defaults/footer.php');
    ?>
</div>
</body>
</html>
