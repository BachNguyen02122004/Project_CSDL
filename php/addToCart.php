<?php
// addToCart.php
// Handle adding the product to the cart in the database
include 'config.php';
$conn = connectDB("localhost","root","Duc[992299]V" , "project");

// Assume you have a database connection established

// $productID = $_POST['productID']; // Get product ID from the POST request
// $userID = $_POST['userID'];

$productID = 7;
$userID = 1;
// Perform database insertion logic here

$Cart = "productInCart";
$amount = 9;
$price = 208.67;

$columns_datas_pair = array(
    "productID" => $productID,
    'userID' => $userID,
    'amount' => $amount,
    'price' => $price
);

addData($conn,$Cart,$columns_datas_pair);

// Send response back to the frontend
$response = array('success' => true); // or array('success' => false, 'error' => 'Error message');
echo json_encode($response);

header("Location: ../html/cart.php");
exit();