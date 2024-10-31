<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ism = htmlspecialchars($_POST['ism']);
    $familiya = htmlspecialchars($_POST['familiya']);
    $yosh = htmlspecialchars($_POST['yosh']);
    $telefon = htmlspecialchars($_POST['telefon']);
    $email = htmlspecialchars($_POST['email']);

    echo "<h2>Ro'yxatdan o'tgan ma'lumotlar:</h2>";
    echo "<p>Ismi: $ism</p>";
    echo "<p>Familiyasi: $familiya</p>";
    echo "<p>Yoshi: $yosh</p>";
    echo "<p>Telefon: $telefon</p>";
    echo "<p>Email: $email</p>";
}


?>
