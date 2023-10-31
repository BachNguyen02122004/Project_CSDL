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

// Lấy giá trị id lớn nhất trong bảng cart
$query = "SELECT MAX(id) AS max_id FROM cart";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$maxId = $row['max_id'];

// Tăng giá trị id lớn nhất lên 1 để sử dụng cho sản phẩm mới
$newId = $maxId + 1;

// Lấy dữ liệu từ request
$data = json_decode(file_get_contents("php://input"));

//changed
$check = "SELECT * FROM cart WHERE productId = '$data->productId' AND TypeProduct = '$data->TypeId'";
$result = mysqli_query($conn, $check);

// Thêm vào giỏ hàng

//changed
if ($result->num_rows == 0) {
    $sql = "INSERT INTO cart (id, productId, productName, productImage, quantity, TypeProduct) VALUES ('$newId', '$data->productId', '$data->name', '$data->image', '$data->quantity', '$data->TypeId')";

    if ($conn->query($sql) === TRUE) {
        $response = "Dữ liệu đã được lưu vào cơ sở dữ liệu thành công";
    } else {
        $response = "Lỗi khi lưu dữ liệu vào cơ sở dữ liệu: " . $conn->error;
    }

} else {
    //changed
    $sql = "UPDATE cart SET quantity = (quantity + $data->quantity) WHERE productId = '$data->productId' AND TypeProduct = '$data->TypeId'";

    if ($conn->query($sql) === TRUE) {
        $response = "Dữ liệu đã được lưu vào cơ sở dữ liệu thành công";
    } else {
        $response = "Lỗi khi lưu dữ liệu vào cơ sở dữ liệu: " . $conn->error;
    }
}

$conn->close();

echo json_encode($response);
?>