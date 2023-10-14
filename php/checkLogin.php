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

$usernameInput = $_GET['usernameInput'];
$userpasswordInput = $_GET['userpasswordInput'];

$queryUser = "SELECT username FROM user WHERE username = '$usernameInput'";
$queryLogin = "SELECT `password` FROM user WHERE username = '$usernameInput'"; 
$resultUser = $mysqli->query($queryUser);
$resultLogin = $mysqli->query($queryLogin);

if ($resultUser->num_rows === 0) {
    $response = array('error' => 'Wrong username ' . $conn->error);
    echo json_encode($response);
} else {
    $row = $resultLogin->fetch_assoc();
    $storedHashedPassword = $row['password'];

    if (password_verify($userpasswordInput, $storedHashedPassword)) {
        $response = array('success' => 'Right password ');
        echo json_encode($response);
    } else {
        $response = array('error' => 'Wrong password' . $conn->error);
        echo json_encode($response);
    }
}

?>