<?php
//check - pass
$servername = "localhost";
$username = "root";
$password = getenv('mySQLPass');
$dbname = "test_project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection to the database failed: " . $conn->connect_error);
}

session_start();
$Username = $_SESSION['username'];
$id = $_SESSION['id'];
$cart_id = $_SESSION['cart_id'];
$addressLine = $_POST['address'];

$checkQuery = "SELECT MAX(id) AS maxID FROM `order`";
$result = mysqli_query($conn, $checkQuery);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $maxId = $row['maxID']; 
} else {
    $maxId = 0;
}

$newId = $maxId + 1;


// Create a new SQL query to insert the data
$insertQuery = "INSERT INTO `order` (id, user_id, order_date, shipping_address, order_total, order_status) 
                VALUES ('$newId', 
                        '$id',
                        NOW(), 
                        (SELECT address.id from (address inner join user_address) WHERE address_line1 = '$addressLine' and user_id = '$id'), 
                        (SELECT COUNT(*) FROM cart_detail WHERE cart_id = '$cart_id' AND is_selected = 1), 
                        0)";


// Execute the insert query
if ($conn->query($insertQuery) === true) {
    $newInsert = "INSERT INTO `order_details` (product_id, order_id, quantity, option_id)
              SELECT product_id, $newId, quantity, option_id
              FROM cart_detail
              WHERE cart_id = $cart_id AND is_selected = 1";
    if ($conn->query($newInsert) === true) {
        $deleteQuery = "DELETE FROM cart_detail WHERE cart_id = '$cart_id' AND is_selected = 1";
        if ($conn->query($deleteQuery) === true) {
            $response = array('success' => 'User added successfully');
        }
    } else {
        $response = array('error' => 'Error delete cart: ' . $conn->error);
    }
    echo json_encode($response);
} else {
    $response = array('error' => 'Error add orders: ' . $conn->error);
    echo json_encode($response);
}

$conn->close();
