<!DOCTYPE html>
<html>

<?php
include_once('defaults/head.php');
?>

<body>
<style type="text/css">
    table {
        border-collapse: collapse;
        border: 1px solid black;
    }
    td {
        border: 1px solid black;
        width: 150px;
    }

</style>
<div class="container">
    <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');
    global $times;
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/contact">Contact</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2>Locatie</h2>
                    <h4>Zuid Hollandse weg 6a</h4> <br>
                    <h2>Openingstijden</h2>
                    <table>
                        <?php foreach ($times as $time): ?>
                            <tr>
                                <td><?= $time->day?></td>
                                <td ><?= $time->time?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d93541.45745641329!2d4.139378199281386!3d51.81314987519917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c44e5021cc6985%3A0xc5ffac61bc399b7d!2sHollandseweg%206%2C%203227%20CB%20Oudenhoorn!5e0!3m2!1sen!2snl!4v1646582252321!5m2!1sen!2snl" width="870" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <?php
    include_once ('defaults/footer.php');
    ?>

</div>

</body>
</html>

