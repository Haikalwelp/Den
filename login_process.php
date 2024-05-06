<?php
session_start(); // Start the session
require_once('database.php'); // Include the database.php file for database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // You can perform input validation and hashing of passwords as needed here

    // Connect to the database
    $db = Database::connect();

    // Prepare a SQL query to fetch the user with the given username and password
    $query = "SELECT id FROM users WHERE username = :username AND password = :password";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password); // You should hash the password in a real-world scenario

    // Execute the query
    $stmt->execute();

    // Check if a user with the provided credentials exists
    if ($stmt->rowCount() == 1) {
        // User authenticated successfully
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Store the user's ID in a session variable
        $_SESSION['user_id'] = $user['id'];

        // You can redirect to a success page or set session variables
        header("Location: home.php"); // Redirect to a dashboard page
        exit();
    } else {
        // Invalid credentials, display an error message or redirect to a login page
        echo "Invalid username or password!";
        // You can redirect or display an error message here.
    }

    // Disconnect from the database
    Database::disconnect();
} else {
    // Handle cases where the form wasn't submitted via POST
    // You can redirect or display an error message here.
}
?>
