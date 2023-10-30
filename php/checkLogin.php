<?php
$servername = "localhost";
$username = "root";
$password = getenv('mySQLPass');
$dbname = "project";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $mysqli->connect_error);
}
// ...
$usernameInput = $mysqli->real_escape_string($_GET['username']);
$userpasswordInput = $mysqli->real_escape_string($_GET['password']);

$queryUser = "SELECT username, password FROM nguoi_dung WHERE username = '$usernameInput'";
$resultUser = $mysqli->query($queryUser);

if ($resultUser->num_rows === 0) {
    $response = array('error' => 'Wrong username');
    echo json_encode($response);
} else {
    $row = $resultUser->fetch_assoc();
    $storedPassword = $row['password'];

    if ($userpasswordInput === $storedPassword) {
        $response = array('success' => 'Right password');
        echo json_encode($response);
    } else {
        $response = array('error' => 'Wrong password');
        echo json_encode($response);
    }
}
