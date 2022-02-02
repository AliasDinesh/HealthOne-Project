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
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/member/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/member/contact">Contact</a></li>
        </ol>
    </nav>

    <h2 class="text-center">Over onze vestiging</h2>


    <br>

    <div class="row">
        <div class="col-md-10 mx-auto d-block">

            <p>Zie hieronder de openingstijden en locatie van onze kantine.
                <br>- Bij ons kunt u geen contant betalen, alleen pinnen.
                <br>- Wij zijn niet telefonisch beschikbaar, en kunt u alleen met voorstellen komen aan de bali.
            </p>

            <?php
            try {
                $db = new PDO("mysql:host=localhost;dbname=kantine","root", "");
                $query = $db->prepare ("SELECT * FROM openingstijden");
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                echo "<table>";
                foreach ($result as $data) {
                    echo "<td>" . $data ["day"] . " ";
                    echo "<td>" . $data ["time"] . "<br>";
                    echo "</tr>";
                }
                echo "</table>";
            } catch(PDOException $e) {
                die("Error!: " . $e->getMessage());
            }
            ?>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-sm-10 rounded mx-auto d-block">
            <!-- <h2 class="text-center">Locatie</h2> -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d613.4828709791777!2d4.24947072928173!3d52.04456079873292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa02397ac42a9b174!2zNTLCsDAyJzQwLjQiTiA0wrAxNScwMC4xIkU!5e0!3m2!1snl!2snl!4v1643386274592!5m2!1snl!2snl" width="1080" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <br>
            <h6 class="text-center">We zijn gevestigd aan Tinwerf 10, 2544 ED Den Haag</h6>
            <br>
        </div>
    </div>

    <br><hr><br>

    <?php
    include_once ('defaults/footer.php');
    ?>
</div>
</body>
</html>