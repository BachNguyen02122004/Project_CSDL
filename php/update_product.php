<?php
session_start();

$servername = "localhost";
$username = "root";
$password = getenv('mySQLPass');
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}


$data = json_decode(file_get_contents("php://input"));


$sql = "INSERT INTO cart (id, productId, productName, productImage) VALUES ('$data->id', '$data->productId', '$data->name', '$data->image')";

if ($conn->query($sql) === TRUE) {
    $response = "Dữ liệu đã được lưu vào cơ sở dữ liệu thành công";
} else {
    $response = "Lỗi khi lưu dữ liệu vào cơ sở dữ liệu: " . $conn->error;
}




$conn->close();


echo json_encode($response);
?>