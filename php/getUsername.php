<?php
//check - pass
session_start();
$_SESSION['username'] = $_SESSION['username'] ?? null;
$_SESSION['id'] = $_SESSION['id'] ?? null;
$_SESSION['cart_id'] = $_SESSION['cart_id'] ?? null;

$username = $_SESSION['username'];
$id = $_SESSION['id'];
$cart_id = $_SESSION['cart_id'];
$response = array('username' => $username);
echo json_encode($response);
?>
