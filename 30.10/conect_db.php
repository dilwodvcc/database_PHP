<?php
$servername = "localhost";
$username = "root";
$password = "parol";
$database = "your_database_name";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Ulanishda xatolik: " . mysqli_connect_error());
}

$sql = "SELECT * FROM your_table_name";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    foreach ($result as $row) {
        echo "ID: " . $row['id'] . "<br>";
        echo "Ismi: " . $row['name'] . "<br>";
        echo "Kelgan vaqti: " . $row['arrived_at'] . "<br>";
        echo "Ketgan vaqti: " . $row['leaved_at'] . "<br>";
        echo "<hr>";
    }
} else {
    echo "Ma'lumot yo'q.";
}
mysqli_close($conn);
?>
