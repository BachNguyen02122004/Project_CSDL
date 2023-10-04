<?php

// Kết nối đến cơ sở dữ liệu MySQL
$servername = 'localhost';
$username = 'root';
$password = getenv('mySQLPass');
$dbname = 'project';

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Lấy giá trị của tham số "id" từ URL
$productId = $_GET['id'];

// Truy vấn dữ liệu sản phẩm từ cơ sở dữ liệu
$sql = "SELECT * FROM product WHERE ID = '$productId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Lấy thông tin sản phẩm từ kết quả truy vấn
    $row = $result->fetch_assoc();
    $productName = $row['name'];
    $productImage = $row['IMAGE'];
    $productDescription = $row['MIEUTA_SP'];
} else {
    echo "Không tìm thấy sản phẩm.";
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>