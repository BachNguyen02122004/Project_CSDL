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

<<<<<<< HEAD

$query = "SELECT MAX(id) AS max_id FROM cart";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$maxId = $row['max_id'];


$newId = $maxId + 1;


=======
//get data
>>>>>>> a64dd99cc3f446cd97a3d55a1c089c5b84608a21
$data = json_decode(file_get_contents("php://input"));

$check = "SELECT * FROM cart WHERE productId = '$data->productId'";
$result = mysqli_query($conn, $check);

<<<<<<< HEAD
// Thêm vào giỏ hàng
if ($result->num_rows == 0) {
    $sql = "INSERT INTO cart (id, productId, productName, productImage, quantity) VALUES ('$newId', '$data->productId', '$data->name', '$data->image', '$data->quantity')";
=======
//adding to cart
if ($result->num_rows == 0) {
    $sql = "INSERT INTO cart (id, productId, productName, productImage, quantity) VALUES ('$data->id', '$data->productId', '$data->name', '$data->image', '$data->quantity')";
>>>>>>> a64dd99cc3f446cd97a3d55a1c089c5b84608a21

    if ($conn->query($sql) === TRUE) {
        $response = "Dữ liệu đã được lưu vào cơ sở dữ liệu thành công";
    } else {
        $response = "Lỗi khi lưu dữ liệu vào cơ sở dữ liệu: " . $conn->error;
    }

} else {
<<<<<<< HEAD
    $sql = "UPDATE cart SET quantity = (quantity + $data->quantity) WHERE productId = '$data->productId'";

=======

    $sql = "UPDATE cart SET quantity = (quantity + $data->quantity) WHERE productId = '$data->productId'";


>>>>>>> a64dd99cc3f446cd97a3d55a1c089c5b84608a21
    if ($conn->query($sql) === TRUE) {
        $response = "Dữ liệu đã được lưu vào cơ sở dữ liệu thành công";
    } else {
        $response = "Lỗi khi lưu dữ liệu vào cơ sở dữ liệu: " . $conn->error;
    }
}

$conn->close();

echo json_encode($response);
?>
