<?php
// function to get opening times
function getOpeningTimes():array
{
    global $pdo;
    $sth = $pdo->prepare("SELECT * FROM openingstijden");
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'OpeningTime');
}
