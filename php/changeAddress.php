<?php
//check - pass
$servername = "localhost";
$username = "root";
$password = getenv('mySQLPass');
$dbname = "test_project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}
session_start();
$id = $_SESSION['id'];
$addressId = $_GET['id'];
$response;
$query = "UPDATE user_address SET is_default = 1 WHERE address_id = '$addressId' AND user_id = '$id'";
if ($conn->query($query) === true) {
    $secondQuery = "UPDATE user_address SET is_default = 0 WHERE NOT (address_id = '$addressId') AND user_id = '$id'";
    if ($conn->query($secondQuery) === true) {
        $response = array('success' => 'change default success');
    } else {
        $response = array('error' => 'delete default failed');
    }
} else {
    $response = array('error' => 'change default failed');
}
echo json_encode($response);
?>