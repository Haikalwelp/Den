<?php
session_start();
require 'database.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['userrole'] !== 'guest') {
    header("location: login.php");
    exit;
}

echo "<h2>Guest Page</h2>";
echo "<p>List of Users Who Haven't Scanned Their RFID Tags</p>";

$pdo = Database::connect();
$sql = "SELECT * FROM students WHERE scanned = 0"; // Replace with your actual SQL query
foreach ($pdo->query($sql) as $row) {
    echo $row['name'] . '<br>'; // Adjust based on your table structure
}
Database::disconnect();

echo '<br><a href="logout.php">Logout</a>';
?>
