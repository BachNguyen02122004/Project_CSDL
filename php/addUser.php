<?php
//check - pass
$servername = "localhost";
$username = "root";
$password = getenv('mySQLPass');
$dbname = "test_project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection to the database failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"));
$user = $data->fullName;
$newUsername = $data->usernameInput;
$newPassword = password_hash($data->passwordInput, PASSWORD_DEFAULT);
$id;
$cartID = 0;

$checkForDuplicate = "SELECT id FROM `user` WHERE username = '$newUsername'";
if ($conn->query($checkForDuplicate) === false) {

    // Create a new SQL query to insert the data
    $checkUser = "Select id from user";
    $result = mysqli_query($conn, $checkUser);
    $id = $result->num_rows + 1;

    $insertQuery = "INSERT INTO user(id, username, email_address, password) VALUES ('$id','$user','$newUsername', '$newPassword')";

    // Execute the insert query
    if ($conn->query($insertQuery) === true) {
        $checkCart = "SELECT id from cart";
        $result = $conn->query($checkCart);
        $cartID = $result->num_rows + 1;

        $createCart = "insert into cart values ('$cartID', '$id')";
        if ($conn->query($createCart) === true) {
            $response = array('success' => 'added cart');
        } else {
            $response = array('error' => 'adding cart failed');
        }

        echo json_encode($response);
    } else {
        $response = array('error' => 'Error adding user: ' . $conn->error);
        echo json_encode($response);
    }
} else {
    $response = array('error' => 'Username has been used');
    echo json_encode($response);
}

$conn->close();
