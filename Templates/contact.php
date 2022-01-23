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
                    <h2 class="card-title">Locatie</h2>
                    <h4>Zuid Hollandse weg 6a</h4> <br>
                    <h2 class="card-title">Openingstijden</h2>
                    <?php
                    try {
                        $db = new PDO("mysql:host=localhost;dbname=healthone","root", "");
                        $query = $db->prepare ("SELECT * FROM openingstijden");
                        $query->execute();
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
                        echo "<table>";
                        foreach ($result as &$data) {
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
        </div>
    </div>
    <hr>
    <?php
    include_once ('defaults/footer.php');
    ?>

</div>

</body>
</html>

