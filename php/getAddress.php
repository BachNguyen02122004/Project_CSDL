<?php
$servername = "localhost";
$username = "root";
$password = getenv('mySQLPass');
$dbname = "project";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $mysqli->connect_error);
}

session_start();
$id = $_SESSION['id'];
$username = $_SESSION['username'];

$queryAddress = "SELECT fullname, sdt, addressLine FROM (nguoi_dung AS u INNER JOIN address AS a ON u.id = a.user_id) WHERE u.id = '$id'";
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