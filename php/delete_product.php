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


if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    
    $data = json_decode(file_get_contents("php://input"), true);
    
    
    if (isset($data['productId'])) {
        $productId = $data['productId'];

        
        $sql = "DELETE FROM cart WHERE productId = $productId";
        if ($conn->query($sql) === TRUE) {
           
            $response = array('message' => 'Xóa sản phẩm thành công');
            echo json_encode($response);
        } else {
            
            $response = array('error' => 'Lỗi khi xóa sản phẩm: ' . $conn->error);
            echo json_encode($response);
        }
    } else {
        
        $response = array('error' => 'Thiếu trường productId trong dữ liệu');
        echo json_encode($response);
    }
} else {
    
    $response = array('error' => 'Phương thức request không hợp lệ');
    echo json_encode($response);
}


$conn->close();

?>