
<?php
//check - pass
session_start();

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

$data = json_decode(file_get_contents("php://input"));


if ($_SERVER["REQUEST_METHOD"] === "DELETE") {

    $data = json_decode(file_get_contents("php://input"), true);


    //changed
    if (isset($data['productId']) && isset($data['typeId'])) {

        $productId = $data['productId'];
        $typeId = $data['typeId'];

        $take = "SELECT cart_detail.id FROM (cart_detail inner join variation_option on cart_detail.option_id = variation_option.id) WHERE product_id = '$productId' AND cart_id = '$cart_id' and variation_option.value = '$typeId'";
        $result = mysqli_query($conn, $take);
        if($result) {
            $id = mysqli_fetch_assoc($result)['id'];
        }

        //changed
        $sql = "DELETE FROM cart_detail WHERE id = '$id'";
        if ($conn->query($sql) === TRUE) {

            $response;
            $query = "UPDATE cart_detail SET id = id - 1 WHERE id > ?";
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