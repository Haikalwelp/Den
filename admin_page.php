<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['userrole'] !== 'admin') {
    header("location: login.php");
    exit;
}

echo "<h2>Admin Dashboard</h2>";
echo "<p>Welcome, " . $_SESSION['username'] . "!</p>";

// Links to other pages
echo '<a href="registration.php">Registration</a><br>';
// ... add other links as needed

echo '<br><a href="logout.php">Logout</a>';
?>
