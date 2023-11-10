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

session_start();
$id = $_SESSION['id'];

$data = json_decode(file_get_contents("php://input"));
$fullname = $data->name;
$addressLine =  $data->address;
$sdt = $data->phoneNumber;

// Create a new SQL query to insert the data
if (isset($id) && $id != null) {
    $insertQuery = "INSERT INTO address(user_id, addressLine) VALUES ('$id', '$addressLine')";
    $anotherInsert = "UPDATE nguoi_dung SET sdt = '$sdt', fullname = '$fullname' WHERE id = '$id'";
    // Execute the insert query
    if ($conn->query($insertQuery) === true && $conn->query($anotherInsert)) {
        $response = array('success' => 'User added successfully');
        echo json_encode($response);
    } else {
        $response = array('error' => 'Error adding user: ' . $conn->error);
        echo json_encode($response);
    }
}

$conn->close();
