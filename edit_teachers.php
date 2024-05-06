<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editTeacherId"])) {
    $id = $_POST["editTeacherId"];
    $username = $_POST["editUsername"];
    $password = $_POST["editPassword"];

    $pdo = Database::connect();
    $sql = "UPDATE teachers SET username = ?, password = ? WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($username, $password, $id));
    Database::disconnect();
    header("Location: teacher_management.php"); // Redirect back to the management page
}
?>
