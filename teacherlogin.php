
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Teacher</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-green-500 to-teal-500 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Welcome</h1>
            <p class="text-sm text-gray-600">Login to Denz Attendance Tracking System</p>
        </div>
        <form action="loginteacher.php" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-gray-600">Username:</label>
                <input type="text" id="username" name="username" required autocomplete="off" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-green-300">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-600">Password:</label>
                <input type="password" id="password" name="password" required class="w-full border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-green-300">
            </div>
            <div class="text-center">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300 transform hover:scale-105">Login</button>
            </div>
        </form>
        <div class="mt-4 text-center">
            <a href="#" class="text-green-500 hover:underline">Forgot Password?</a>
        </div>
    </div>
</body>
</html>
