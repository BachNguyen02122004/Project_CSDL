<!-- this file gets array from cart change -->
<?php
$servername = "localhost";
$username = "root";
$password = getenv('mySQLPass');
$dbname = "project";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $mysqli->connect_error);
}

$id = $_GET['index'];
$quantity = $_GET['value'];

// Prepare and bind the update query
$query = $mysqli->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
$query->bind_param("ii", $quantity, $id);

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
