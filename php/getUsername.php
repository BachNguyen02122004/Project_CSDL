<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = null;
}

$username = $_SESSION['username'];
$response = array('username' => $username);
echo json_encode($response);
?>
