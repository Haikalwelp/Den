<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-green-500 to-teal-500 min-h-screen flex flex-col">

    <header class="bg-green-800 text-white p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-lg font-bold">Administrator Dashboard</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="home.php" class="hover:bg-green-700 p-2 rounded">Home</a></li>
                    <li><a href="user data.php" class="hover:bg-green-700 p-2 rounded">Student Data</a></li>
                    <li><a href="registration.php" class="hover:bg-green-700 p-2 rounded">Registration</a></li>
                    <li><a href="read tag.php" class="hover:bg-green-700 p-2 rounded">Read Tag ID</a></li>
                    <li><a href="teacher_management.php" class="hover:bg-green-700 p-2 rounded">Manage Teachers</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="logout.php" class="hover:bg-green-700 p-2 rounded">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <main class="flex-grow container mx-auto text-center p-4">
        <h2 class="text-3xl font-bold text-gray-800 my-4">Welcome to Denz Attendance Tracking System</h2>
    </main>

    <footer class="bg-green-800 text-white p-4 text-center">
        © 2024 Denz Attendance Tracking System
    </footer>

</body>
</html>
