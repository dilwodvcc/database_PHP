<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodim Ish Vaqti Hisoblash</title>
</head>
<body>
    <form method="GET">
        <label for="arrived_at">Kelib tushgan vaqt:</label>
        <input type="datetime-local" id="arrived_at" name="arrived_at" required><br><br>
        
        <label for="leaved_at">Ketgan vaqt:</label>
        <input type="datetime-local" id="leaved_at" name="leaved_at" required><br><br>
        
        <button type="submit">Hisoblash</button>
    </form>

    <?php
    if (isset($_GET['arrived_at']) && isset($_GET['leaved_at'])) {
        // Foydalanuvchi kiritgan vaqtlardan DateTime ob'ektlarini yaratamiz
        $arrived_at = new DateTime($_GET['arrived_at']);
        $leaved_at = new DateTime($_GET['leaved_at']);
        
        // Oradagi farqni hisoblaymiz
        $diff = $arrived_at->diff($leaved_at);
        
        // Natijani ko'rsatamiz
        echo "<h1>Kelib tushgan vaqt: " . htmlspecialchars($_GET['arrived_at']) . "</h1>";
        echo "<h1>Ketgan vaqt: " . htmlspecialchars($_GET['leaved_at']) . "</h1>";
        echo "<h1>Ishlangan soat: " . $diff->h . " soat " . $diff->i . " minut</h1>";
    }
    ?>
</body>
</html>

