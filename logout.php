<?php
session_start(); // Start the session

// Check if the user is logged in (user_id is set in the session)
if (isset($_SESSION['user_id'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other appropriate page
    header("Location: login.php"); // Replace 'login.php' with your actual login page
    exit();
} else {
    // If the user is not logged in, you can redirect them to the login page or any other page
    header("Location: login.php"); // Replace 'login.php' with your actual login page
    exit();
}
?>
