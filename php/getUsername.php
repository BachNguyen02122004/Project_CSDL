<?php
session_start();
$username = $_SESSION['username'];
$response = array('username' => $username);
echo json_encode($response);
?>
