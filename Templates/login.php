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
    <?php if (!empty($message)): ?>
        <div class="alert alert-danger" role="alert">
             <?=$message?>
        </div>
    <?php endif;?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/login">Login</a></li>
        </ol>
    </nav>
    <form method="post">
        <div class="mb-3">
            <label for="example1" class="form-label">Email address</label>
            <input type="text" class="form-control" name="email" id="example1">
        </div>
        <div class="mb-3">
            <label for="example2" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="example2"
        </div>
        <br>
        <button type="submit" name="login" class="btn btn-primary">Submit</button>
    </form>
    <hr>
    <?php
    include_once('defaults/footer.php');
    ?>
</div>

</body>
</html>

