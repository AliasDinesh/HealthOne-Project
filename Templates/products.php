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
    global $product, $name;
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/categories">Categories</a></li>
            <li class="breadcrumb-item"><a href="/categories/<?= $product->category_id ?>"> <?= $name ?></a></li>
        </ol>
    </nav>
    <div class="row gy-3 ">
        <?php global $products?>
        <?php foreach ($products as $product) : ?>
            <div class="col-sm-4 col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <a href="/product/<?= $product->id?>">
                            <img class="product-img img-responsive center-block" src='/img/<?= $product->picture?>' alt="sportaparaat"/>
                        </a>
                        <div class="card-title mb-3"><?= $product->name ?></div>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>

    </div>
</div>

<hr>
<?php
include_once('defaults/footer.php');

?>

</body>
</html>