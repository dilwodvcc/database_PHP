<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    
</body>
</html>
<?php
    $message = "Salom, Ro'yxatdan o'tish sahifasiga xush kelibsiz!";
    echo "<h2>$message</h2>";
?>

<form action="2.php" method="POST">
    <label for="ism">Ism:</label><br>
    <input type="text" id="ism" name="ism" required><br><br>

    <label for="familiya">Familiya:</label><br>
    <input type="text" id="familiya" name="familiya" required><br><br>

    <label for="yosh">Yosh:</label><br>
    <input type="number" id="yosh" name="yosh" required><br><br>

    <label for="telefon">Telefon:</label><br>

    <input type="tel" id="telefon" name="telefon"
            required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <button type="submit">Yuborish</button>
</form>
</body>
</html>
