<?php
require 'database.php';
session_start();

function getTeachers() {
    $pdo = Database::connect();
    $sql = "SELECT * FROM teachers";
    $result = $pdo->query($sql);
    Database::disconnect();
    return $result;
}

function addTeacher($username, $password, $fullname, $phone) {
    $pdo = Database::connect();
    $sql = "INSERT INTO teachers (username, password, fullname, phone) VALUES (?, ?, ?, ?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($username, $password, $fullname, $phone));
    Database::disconnect();
}

function deleteTeacher($id) {
    $pdo = Database::connect();
    $sql = "DELETE FROM teachers WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Database::disconnect();
}

function editTeacher($id, $username, $password, $fullname, $phone) {
    $pdo = Database::connect();
    $sql = "UPDATE teachers SET username = ?, password = ?, fullname = ?, phone = ? WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($username, $password, $fullname, $phone, $id));
    Database::disconnect();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addTeacher"])) {
    addTeacher($_POST["username"], $_POST["password"], $_POST["fullname"], $_POST["phone"]);
}

if (isset($_GET["deleteTeacher"])) {
    deleteTeacher($_GET["deleteTeacher"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editTeacher"])) {
    editTeacher($_POST["editTeacherId"], $_POST["editUsername"], $_POST["editPassword"], $_POST["editFullname"], $_POST["editPhone"]);
}

$teachers = getTeachers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Management</title>
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

    <main class="container mx-auto p-4">
        <h2 class="text-2xl font-bold text-white text-center my-4">Teacher Management</h2>

        <!-- Form for Adding a Teacher -->
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <form method="post" action="teacher_management.php">
        <div class="mb-4">
            <label for="fullname" class="block text-sm font-bold mb-2">Full Name:</label>
            <input type="text" class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="fullname" name="fullname" required>
        </div>
        <div class="mb-4">
            <label for="username" class="block text-sm font-bold mb-2">Username:</label>
            <input type="text" class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="username" name="username" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-bold mb-2">Password:</label>
            <input type="password" class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="password" name="password" required>
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-sm font-bold mb-2">Phone:</label>
            <input type="text" maxlength="11" class="form-control block w-full px-3 py-2 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="phone" name="phone" required>
        </div>
        <button type="submit" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="addTeacher">Add Teacher</button>
    </form>
</div>



        <!-- List of Teachers -->
        <div class="mt-8 bg-white p-6 rounded shadow">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Teachers</h3>
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            ID
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Username
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Full Name
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Phone
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($teachers as $teacher): ?>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <?php echo htmlspecialchars($teacher['id']); ?>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <?php echo htmlspecialchars($teacher['username']); ?>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <?php echo htmlspecialchars($teacher['fullname']); ?>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <?php echo htmlspecialchars($teacher['phone']); ?>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <a href="teacher_management.php?deleteTeacher=<?php echo $teacher['id']; ?>" class="text-red-500 hover:text-red-700">Delete</a>
                            <a href="#" class="text-blue-500 hover:text-blue-700 ml-4">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="bg-green-800 text-white p-4 text-center mt-auto">
        © 2024 Denz Attendance Tracking System
    </footer>

</body>
</html>
