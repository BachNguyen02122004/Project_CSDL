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
$addressLine =  $data->address;

// Create a new SQL query to insert the data
$insertQuery = "INSERT INTO address(user_id, addressLine) VALUES ('1', '$addressLine')";

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