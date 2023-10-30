<?php

$servername = "localhost";
$username = "root";
$password = getenv('mySQLPass');
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection to the database failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"));
$user = $data->fullName;
$newUsername = $data->usernameInput;
$newPassword = $data->passwordInput;

// Create a new SQL query to insert the data
$insertQuery = "INSERT INTO nguoi_dung(fullname, username, password) VALUES ('$user', '$newUsername', '$newPassword')";

// Execute the insert query
if ($conn->query($insertQuery) === true) {
    $response = array('success' => 'User added successfully');
    echo json_encode($response);
} else {
    $response = array('error' => 'Error adding user: ' . $conn->error);
    echo json_encode($response);
}

$conn->close();
?>