<?php
//check - pass
$servername = "localhost";
$username = "root";
$password = getenv('mySQLPass');
$dbname = "test_project";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $mysqli->connect_error);
}

session_start();
$id = $_SESSION['id'];
$username = $_SESSION['username'];

$queryAddress = "SELECT username, a.phone_number, address_line1, address_line2, is_default FROM (user AS u INNER JOIN user_address as ua ON u.id = ua.user_id INNER JOIN address as a ON a.id = ua.address_id) WHERE u.id = '$id'";
$result = $mysqli->query($queryAddress);

if ($result) {
    $addresses = array();

    while ($row = $result->fetch_assoc()) {
        $addresses[] = $row;
    }

    echo json_encode($addresses);
} else {
    echo "Error in the query: " . $mysqli->error;
}

$mysqli->close();
?>