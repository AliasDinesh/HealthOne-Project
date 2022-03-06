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
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail" readonly="readonly" value="
                <?php if (isset($_SESSION['user']->email)) { echo $_SESSION['user']->email;} else { echo "";} ?>">
        </div>
        <div class="col-md-12">
            <label for="inputFirstName" class="form-label">First name</label>
            <input type="text" name="first_name" class="form-control" id="inputFirstName" placeholder="<?=$_SESSION['user']->first_name ?>">
        </div>
        <div class="col-md-12">
            <label for="inputLastName" class="form-label">Last name</label>
            <input type="text" class="form-control" name="last_name" id="inputLastName" placeholder="<?=$_SESSION['user']->last_name ?>">
        </div>
        <div class="col-12">
            <button type="submit" name="profile" class="btn btn-primary">Aanpassen profiel</button>\
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
