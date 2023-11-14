<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = null;
}
if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = null;
}

$username = $_SESSION['username'];
$id = $_SESSION['id'];
$response = array('username' => $username, 'id' => $id);
echo json_encode($response);
?>
