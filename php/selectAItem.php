<?php
//check - pass
$servername = "localhost";
$username = "root";
$password = getenv('mySQLPass');
$dbname = "test_project";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $mysqli->connect_error);
}

session_start();
$cart_id = $_SESSION['cart_id'];

$id = $_GET['index'];
$state = $_GET['state'];
$typeProduct = $_GET['productType'];

// Prepare and bind the update query
$query = $mysqli->prepare("UPDATE cart_detail SET is_selected = ? WHERE product_id = ? AND cart_id = '$cart_id' AND option_id IN (SELECT id FROM variation_option WHERE value = '$typeProduct')");
$query->bind_param("ii", $state, $id);

// Execute the query
if ($query->execute()) {
    // Update successful, send a success response
    echo json_encode(array("status" => "success", "message" => "Quantity updated successfully"));
} else {
    // Update failed, send an error response
    echo json_encode(array("status" => "error", "message" => "Error updating quantity: " . $mysqli->error));
}

// Close the prepared statement and database connection
$query->close();
$mysqli->close();
?>
