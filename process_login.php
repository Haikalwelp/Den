<?php
// Hardcoded credentials for example
$admin_username = 'admin';
$admin_password = 'admin123';

$guest_username = 'guest';
$guest_password = 'guest123';

session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $admin_username && $password == $admin_password) {
        // Admin credentials; set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['userrole'] = 'admin';

        header("location: admin_page.php"); // Redirect to the admin page
    } elseif ($username == $guest_username && $password == $guest_password) {
        // Guest credentials; set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['userrole'] = 'guest';

        header("location: guest_page.php"); // Redirect to the guest page
    } else {
        // Incorrect credentials
        echo "Invalid username or password";
    }
}
?>
