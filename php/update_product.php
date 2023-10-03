<?php
session_start();
// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";
$password = "Duc[992299]V";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ phản hồi
$data = json_decode(file_get_contents("php://input"));

// Truy vấn chèn dữ liệu vào cơ sở dữ liệu
$sql = "INSERT INTO cart (id, productId, productName, productImage) VALUES ('$data->id', '$data->productId', '$data->name', '$data->image')";

if ($conn->query($sql) === TRUE) {
    $response = "Dữ liệu đã được lưu vào cơ sở dữ liệu thành công";
} else {
    $response = "Lỗi khi lưu dữ liệu vào cơ sở dữ liệu: " . $conn->error;
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();

// Trả về phản hồi cho client
echo json_encode($response);
?>