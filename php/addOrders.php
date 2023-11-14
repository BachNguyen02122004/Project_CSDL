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
$Username = $_SESSION['username'];
$id = $_SESSION['id'];

// Create a new SQL query to insert the data
$insertQuery = "INSERT INTO orders (productId, productName, productImage, quantity, TypeProduct, username) SELECT productId, productName, productImage, quantity, TypeProduct, username from cart where cart.username = '$Username'";

// Execute the insert query
if ($conn->query($insertQuery) === true) {
    $deleteQuery = "DELETE FROM cart WHERE username = '$Username'";
    if ($conn->query($deleteQuery) === true) {
        $response = array('success' => 'User added successfully');
    } else {
        $response = array('error' => 'Error delete cart: ' . $conn->error);
    }
    echo json_encode($response);
} else {
    $response = array('error' => 'Error add orders: ' . $conn->error);
    echo json_encode($response);
}

$conn->close();
