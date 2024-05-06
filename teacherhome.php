<?php
require_once('auth.php');
$Write = "<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php', $Write);
?>

<!DOCTYPE html>
<html lang="en">
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
	<style>
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
			text-align: center;
		}

		ul.topnav {
			list-style-type: none;
			margin: auto;
			padding: 0;
			overflow: hidden;
			background-color: #4CAF50;
			width: 70%;
		}

		ul.topnav li {
			float: left;
		}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		ul.topnav li a:hover:not(.active) {
			background-color: #3e8e41;
		}

		ul.topnav li a.active {
			background-color: #333;
		}

		ul.topnav li.right {
			float: right;
		}

		@media screen and (max-width: 600px) {

			ul.topnav li.right,
			ul.topnav li {
				float: none;
			}
		}

		img {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
	</style>

	<title>Home : Teacher Dashboard</title>
</head>

<body class="bg-gradient-to-r from-green-500 to-teal-500">
<h2 class="text-3xl font-bold text-gray-800 mt-4 mb-4">Teacher Dashboard</h2>
	<ul class="topnav">
		<li><a class="active" href="home.php">Home</a></li>
		<li><a href="studentdata.php">Student Data</a></li>
		<?php
		if (isset($_SESSION['user_id'])) {
			echo '<li><a href="logout.php">Logout</a></li>';
		}
		?>
	</ul>
	<br>
	<h3 class="text-3xl font-bold text-gray-800 mt-4 mb-4">Welcome to Denz Attendance Tracking System</h3>

	<img src="" alt="" style="width:55%;">
</body>

</html>