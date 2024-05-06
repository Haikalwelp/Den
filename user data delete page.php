<?php
    require 'database.php';
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM students  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: user data.php");
         
    }
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete : Student</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-green-500 to-teal-500 min-h-screen flex flex-col justify-center items-center">
    <div class="text-center">
        <h2 class="text-lg font-bold text-white mb-4">Delete Student</h2>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 inline-block">
            <h3 class="text-gray-800 text-xl font-bold mb-4">Confirm Deletion</h3>
            <form action="user data delete page.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <p class="text-red-600">Are you sure you want to delete this student?</p>
                <div class="flex justify-center space-x-4">
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Yes</button>
                    <a href="user data.php" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">No</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
