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
                        (SELECT id from (address inner join user_address on user_address.address_id = address.id) WHERE user_id = $id and is_default = 1), 
                        (SELECT COUNT(*) FROM cart_detail WHERE cart_id = '$cart_id' AND is_selected = 1), 
                        0)";


// Execute the insert query
if ($conn->query($insertQuery) === true) {
    $newInsert = "INSERT INTO order_details (product_id, order_id, quantity, option_id)
              SELECT product_id, $newId, quantity, option_id
              FROM cart_detail
              WHERE cart_id = $cart_id AND is_selected = 1";
    if ($conn->query($newInsert) === true) {
        $updateQuery = "UPDATE product p
                            INNER JOIN cart_detail cd ON p.id = cd.product_id
                            SET p.quantity_in_stock = p.quantity_in_stock - cd.quantity
                            WHERE cd.cart_id = '$cart_id'";
    if($conn->query($updateQuery) === true){
        $response = array('success' => 'User added successfully');
    }
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