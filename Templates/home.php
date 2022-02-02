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
            global $member;
            ?>
            <?php if (!empty($member)): ?>
                <div class="alert alert-success" role="alert">
                    Member: <?=$member?> is toegevoegd!
                </div>
            <?php endif;?>

            <h1 class="home-title">Sportcenter HealthOne</h1>
            <h4 class="home-about">Fit en gezond zijn is geen vanzelfsprekendheid. We moeten er zelf wat voor doen. Goede, gezonde voeding is hiervoor de basis.
                Bewegen hoort hier ook bij. Regelmatig bewegen zorgt voor een goede doorbloeding en draagt bij aan ontspanning van lichaam en geest.</h4>
            <hr>
            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
