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

    global $categories;
    ?>
    <div class="row gy-3">
        <p class="lead">Een product toevoegen</p>
        <form  enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="name" class="col-form-label">
                    Naam:
                </label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="name2" class="col-form-label">
                    Description:
                </label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="name2" class="col-form-label">
                    Bestand:
                </label>
                <input name="userfile" type="file">
                <input type="submit" name="checkfile" value="Controleer bestand">
            </div>
            <div class="mb-3">
                <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Category:</label>
                <select class="custom-select mr-sm-2" name="categories" id="inlineFormCustomSelect">
                    <?php
                    foreach ($categories as $category):?>
                    <option value="<?= $category->id?>"><?= $category->name?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="modal-footer">
                <input type="submit" value="submit" name="addProduct" class="btn btn-primary">
            </div>
        </form>
    </div>
    <?php
    include_once ('defaults/footer.php');
    ?>
</div>
</body>
</html>

<?php
