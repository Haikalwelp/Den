<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    // Validate and sanitize input data as needed

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE students SET name=?, gender=?, email=?, mobile=? WHERE id=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($name, $gender, $email, $mobile, $id));
    Database::disconnect();

    header("Location: user data.php"); // Redirect to the list page after updating
    exit();
}
?>
