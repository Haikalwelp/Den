<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

echo "<h2>Welcome " . $_SESSION['username'] . "!</h2>";
echo "<p>You are logged in as " . $_SESSION['userrole'] . ".</p>";
echo '<a href="logout.php">Logout</a>';
