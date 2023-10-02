<?php

include 'config.php';
$conn = connectDB("localhost","root","Duc[992299]V","project");

$userID = $_GET['userID'];

$cartItems = getData($conn, "productInCart", "userID", $userID);

echo json_encode($cartItems);
?>

