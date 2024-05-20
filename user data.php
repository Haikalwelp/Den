<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data : Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-green-400 to-green-600 min-h-screen flex flex-col">
    <header class="bg-green-800 text-white p-4 shadow-md">
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
        <h2 class="text-3xl font-bold text-gray-100 my-4">Student Data Table</h2>
        <div class="overflow-x-auto mt-6">
            <table class="table-auto w-full mx-auto bg-white rounded-lg shadow-md overflow-hidden">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Gender</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Mobile Number</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php
                    include 'database.php';
                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM students ORDER BY name ASC';
                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td class="border px-4 py-2">' . $row['name'] . '</td>';
                        echo '<td class="border px-4 py-2">' . $row['id'] . '</td>';
                        echo '<td class="border px-4 py-2">' . $row['gender'] . '</td>';
                        echo '<td class="border px-4 py-2">' . $row['email'] . '</td>';
                        echo '<td class="border px-4 py-2">' . $row['mobile'] . '</td>';
                        echo '<td class="border px-4 py-2"><a class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded inline-flex items-center" href="user data edit page.php?id=' . $row['id'] . '">Edit</a>';
                        echo ' <a class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded inline-flex items-center" href="user data delete page.php?id=' . $row['id'] . '">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    Database::disconnect();
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="bg-green-800 text-white p-4 text-center">
        © 2024 Denz Attendance Tracking System
    </footer>

</body>

</html>
