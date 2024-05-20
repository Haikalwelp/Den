<?php
require 'database.php';
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM students where id = ?";
$q = $pdo->prepare($sql);
$q->execute(array($id));
$data = $q->fetch(PDO::FETCH_ASSOC);

if (!is_array($data)) {
    $msg = "The ID of your Card / KeyChain is not registered !!!";
    $data = [
        'id' => $id,
        'name' => "--------",
        'gender' => "--------",
        'email' => "--------",
        'mobile' => "--------"
    ];
} else {
    $msg = null;
}

Database::disconnect();

echo '<div class="bg-white shadow-lg rounded-lg p-4">';
echo '<h4 class="text-lg font-bold text-gray-700 mb-4">User Data</h4>';
echo '<div class="grid grid-cols-3 gap-4">';
echo '<div class="text-left font-medium">ID:</div><div>:</div><div class="text-left">' . $data['id'] . '</div>';
echo '<div class="text-left font-medium bg-gray-100 p-1">Name:</div><div class="bg-gray-100 p-1">:</div><div class="text-left bg-gray-100 p-1">' . $data['name'] . '</div>';
echo '<div class="text-left font-medium">Gender:</div><div>:</div><div class="text-left">' . $data['gender'] . '</div>';
echo '<div class="text-left font-medium bg-gray-100 p-1">Email:</div><div class="bg-gray-100 p-1">:</div><div class="text-left bg-gray-100 p-1">' . $data['email'] . '</div>';
echo '<div class="text-left font-medium">Mobile Number:</div><div>:</div><div class="text-left">' . $data['mobile'] . '</div>';
echo '</div>';
echo '</div>';

if ($msg) {
    echo '<p style="color:red;">' . $msg . '</p>';
}
?>
