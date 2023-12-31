<?php
//check - pass
$servername = "localhost";
$username = "root";
$password = getenv('mySQLPass');
$dbname = "test_project";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $mysqli->connect_error);
}

$usernameInput = $mysqli->real_escape_string($_GET['username']);
$userpasswordInput = $mysqli->real_escape_string($_GET['password']);

$queryUser = "SELECT username, password, user.id as uID, cart.id as cID FROM (user inner join cart on user.id = cart.id) WHERE email_address = '$usernameInput'";
$resultUser = $mysqli->query($queryUser);

if ($resultUser->num_rows === 0) {
    $response = array('error' => 'Wrong username');
    echo json_encode($response);
} else {
    $row = $resultUser->fetch_assoc();
    $storedPassword = $row['password'];

    if (password_verify($userpasswordInput, $storedPassword)) {
        $response = array('success' => 'Correct password');
        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['uID'];
        $_SESSION['cart_id'] = $row['cID'];

        $checking ="UPDATE `order` SET order_status = 
        CASE
        WHEN TIMESTAMPDIFF(HOUR, order_date, NOW()) < 23 then 0
            WHEN TIMESTAMPDIFF(HOUR, order_date, NOW()) BETWEEN 23 AND 47 THEN 1
            WHEN TIMESTAMPDIFF(HOUR, order_date, NOW()) > 47 THEN 2
            
        END
    WHERE id > 0";
        $mysqli->query($checking);
        
        echo json_encode($response);
    } else {
        $response = array('error' => 'Wrong password');
        echo json_encode($response);
    }
} 

?>