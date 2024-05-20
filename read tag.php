<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Tag : RFID Scanner</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <script src="jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#getUID").load("UIDContainer.php");
            setInterval(function() {
                $("#getUID").load("UIDContainer.php");
            }, 500);
        });

        var myVar = setInterval(myTimer, 1000);
        var myVar1 = setInterval(myTimer1, 1000);
        var oldID = "";
        clearInterval(myVar1);

        function myTimer() {
            var getID = document.getElementById("getUID").textContent;
            oldID = getID;
            if (getID !== "") {
                myVar1 = setInterval(myTimer1, 500);
                showUser(getID);
                clearInterval(myVar);
            }
        }

        function myTimer1() {
            var getID = document.getElementById("getUID").textContent;
            if (oldID !== getID) {
                myVar = setInterval(myTimer, 500);
                clearInterval(myVar1);
            }
        }

        function showUser(str) {
            if (str === "") {
                document.getElementById("show_user_data").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        document.getElementById("show_user_data").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "read tag user data.php?id=" + str, true);
                xmlhttp.send();
            }
        }

        setInterval(() => {
            var blink = document.getElementById('blink');
            blink.style.opacity = (blink.style.opacity === '0' ? '1' : '0');
        }, 750);
    </script>
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

    <div class="container mx-auto px-4 mt-8 flex-grow">
        <h3 class="text-2xl font-semibold text-center text-gray-800 mb-2" id="blink">Please Scan Tag to Record Attendance</h3>
        <p id="getUID" hidden></p>

        <div id="show_user_data" class="mt-4">
            <div class="bg-white shadow-lg rounded-lg p-4">
                <h4 class="text-lg font-bold text-gray-700 mb-4">User Data</h4>
                <div class="grid grid-cols-3 gap-4">
                    <div class="text-left font-medium">ID:</div><div>:</div><div class="text-left">--------</div>
                    <div class="text-left font-medium bg-gray-100 p-1">Name:</div><div class="bg-gray-100 p-1">:</div><div class="text-left bg-gray-100 p-1">--------</div>
                    <div class="text-left font-medium">Gender:</div><div>:</div><div class="text-left">--------</div>
                    <div class="text-left font-medium bg-gray-100 p-1">Email:</div><div class="bg-gray-100 p-1">:</div><div class="text-left bg-gray-100 p-1">--------</div>
                    <div class="text-left font-medium">Mobile Number:</div><div>:</div><div class="text-left">--------</div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-green-800 text-white p-4 text-center mt-auto">
        © 2024 Denz Attendance Tracking System
    </footer>

</body>
</html>
