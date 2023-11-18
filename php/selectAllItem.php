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

// Prepare and bind the update query
$query = "UPDATE cart_detail SET is_selected = 1 WHERE cart_id = '$cart_id'";

// Execute the query
if ($mysqli->query($query)) {
    // Update successful, send a success response
    echo json_encode(array("status" => "success", "message" => "Quantity updated successfully"));
} else {
    // Update failed, send an error response
    echo json_encode(array("status" => "error", "message" => "Error updating quantity: " . $mysqli->error));
}

// Close the prepared statement and database connection
$mysqli->close();
?>
