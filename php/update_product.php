<?php
//check - pass
$servername = "localhost";
$username = "root";
$password = getenv('mySQLPass');
$dbname = "test_project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}
session_start();
$Username = $_SESSION['username'];
$cart_id = $_SESSION['cart_id'];

// Lấy giá trị id lớn nhất trong bảng cart
$query = "SELECT MAX(id) AS max_id FROM cart_detail";
$result = mysqli_query($conn, $query);
if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $maxId = $row['max_id']; 
} else {
    $maxId = 0;
}


// Tăng giá trị id lớn nhất lên 1 để sử dụng cho sản phẩm mới
$newId = $maxId + 1;

// Lấy dữ liệu từ request
$data = json_decode(file_get_contents("php://input"));

//changed
$check = "SELECT variation_option.id as voID FROM 
        (cart_detail inner join variation_option on cart_detail.option_id = variation_option.id) 
        WHERE product_id = '$data->productId' 
        AND variation_option.value = '$data->TypeId' 
        AND cart_detail.cart_id = '$cart_id'";
$result = mysqli_query($conn, $check);

// Thêm vào giỏ hàng

//changed
if ($result->num_rows == 0 and $cart_id != null) {
    // Fetching $row1 inside the if block

    $sql = "INSERT INTO cart_detail
    VALUES ('$newId', $cart_id, '$data->productId', '$data->quantity', 0,
            (SELECT vo.id FROM (variation_option as vo
                            INNER JOIN product_configuration as pc ON vo.id = pc.variation_option_id)
            WHERE vo.value = '$data->TypeId' AND pc.product_id = '$data->productId' LIMIT 1));";

    if ($conn->query($sql) === TRUE) {
        $response = "Dữ liệu đã được lưu vào cơ sở dữ liệu thành công + $data->productId + $data->TypeId + $cart_id";
    } else {
        $response = "Lỗi khi lưu dữ liệu vào cơ sở dữ liệu: + $data->productId + $data->TypeId + $cart_id " . $conn->error;
    }

} else {
    //changed
    $row1 = $result->fetch_assoc();
    $sql = "UPDATE cart_detail SET quantity = (quantity + $data->quantity) WHERE product_id = '$data->productId' AND cart_id = '$cart_id' AND option_id = {$row1['voID']}";

    if ($conn->query($sql) === TRUE) {
        $response = "Dữ liệu đã được lưu vào cơ sở dữ liệu thành công";
    } else {
        $response = "Lỗi khi lưu dữ liệu vào cơ sở dữ liệu: " . $conn->error;
    }
}


$conn->close();

echo json_encode($response);
?>