<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>

<body>

<div class="container">
    <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');
    global $message;
    ?>
    <?php if (!empty($member)): ?>
        <div class="alert alert-success" role="alert">
            Member: <?=$member?> is toegevoegd!
        </div>
    <?php endif;?>
    <?php if (!empty($message)): ?>
        <div class="alert alert-danger" role="alert">
            <?=$message?>
        </div>
    <?php endif;?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/register">Register</a></li>
        </ol>
    </nav>
    <form method="post">
        <div class="mb-2">
            <label for="example2" class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control" id="example2"
        </div>
        <div class="mb-2">
            <label for="example2" class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control" id="example2"
        </div>
        <div class="mb-2">
            <label for="example1" class="form-label">Email address</label>
            <input type="text" class="form-control" name="email1" id="example1">
        </div>
        <div class="mb-2">
            <label for="example2" class="form-label">Password</label>
            <input type="password" name="password1" class="form-control" id="example2"
        </div>
        <br>
        <button type="submit" name="register" class="btn btn-primary">Register</button>
    </form>
    <hr>
    <?php
    include_once('defaults/footer.php');
    ?>
</div>

</body>
</html>