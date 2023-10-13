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

        $take = "SELECT id FROM cart WHERE productId = $productId";
        $result = mysqli_query($conn, $take);
        if($result) {
            $id = mysqli_fetch_assoc($result)['id'];
        }

        $sql = "DELETE FROM cart WHERE productId = $productId";
        if ($conn->query($sql) === TRUE) {

            $response;
            $query = "UPDATE cart SET id = id - 1 WHERE id > ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id); // Assuming productId is an integer, use "s" for strings
            if ($stmt->execute()) {     
                $response = array('message' => 'Success');
            } else {
                $response = array('message' => 'Failed');
            }
            $stmt->close();

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