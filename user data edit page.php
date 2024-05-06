<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    $pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM students where id = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit: Student</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-green-500 to-teal-500 min-h-screen flex flex-col items-center justify-center">

    <header class="bg-green-800 text-white p-4 w-full">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-lg font-bold">Edit Student Data</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="home.php" class="hover:bg-green-700 p-2 rounded">Home</a></li>
                    <li><a href="user data.php" class="hover:bg-green-700 p-2 rounded">Student Data</a></li>
                    <li><a href="registration.php" class="hover:bg-green-700 p-2 rounded">Registration</a></li>
                    <li><a href="read tag.php" class="hover:bg-green-700 p-2 rounded">Read Tag ID</a></li>
                    <li><a href="teacher_management.php" class="hover:bg-green-700 p-2 rounded">Manage Teachers</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="w-full max-w-xs mt-6">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="student_update.php" method="post">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">ID</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="id" type="text" value="<?php echo $data['id'];?>" readonly>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" type="text" value="<?php echo $data['name'];?>" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Gender</label>
                <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="gender" id="mySelect">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="text" value="<?php echo $data['email'];?>" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Mobile Number</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="mobile" type="text" value="<?php echo $data['mobile'];?>" required>
            </div>
            
            <div class="flex items-center justify-between">
                <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Update</button>
                <a class="inline-block align-baseline font-bold text-sm text-green-600 hover:text-green-800" href="user data.php">Back</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("mySelect").value = "<?php echo $data['gender']; ?>";
    </script>

</body>
</html>
