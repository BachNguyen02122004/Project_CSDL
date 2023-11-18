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

session_start();
$id = $_SESSION['id'];

$data = json_decode(file_get_contents("php://input"));
$fullname = $data->name;
$addressLine =  $data->address;
$sdt = $data->phoneNumber;
$response;

$checkDuplicate = "SELECT id fROM address where address_line1 = '$addressLine' and phone_number = '$sdt' and name = '$fullname'";
$result = $conn->query($checkDuplicate);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $addID = $row['id'];

    $checkAnotherDuplicate = "SELECT * fROM user_address where user_id = '$id' and address_id = '$addID'";
    $otherResult = $conn->query($checkAnotherDuplicate);
    if ($otherResult->num_rows == 0) {
        $anotherInsert = "INSERT INTO user_address(user_id, address_id, is_default) 
        VALUES ($id, $addID, IFNULL((SELECT 1 - MAX(is_default) FROM (SELECT is_default FROM user_address WHERE user_id = '$id') AS temp), 1))";
        if ($conn->query($anotherInsert) === true) {
            $response = array('success' => 'User added successfully');
        } else {
            $response = array('error' => 'Already added');
        }
    }
} else {
    $sqlQuery = "SELECT max(id) as maxID FROM address";
    $result = $conn->query($sqlQuery);
    $tmpRow = $result->fetch_assoc();
    $addID = $tmpRow['maxID'] + 1;

    // Create a new SQL query to insert the data
    if (isset($id) && $id != null) {
        $insertQuery = "INSERT INTO address(id, address_line1, phone_number, name) VALUES ('$addID','$addressLine', '$sdt', '$fullname')";
        // Execute the insert query
        if ($conn->query($insertQuery) === true) {

            $anotherInsert = "INSERT INTO user_address(user_id, address_id, is_default) 
                  VALUES ($id, $addID, IFNULL((SELECT 1 - MAX(is_default) FROM (SELECT is_default FROM user_address WHERE user_id = '$id') AS temp), 1))";
            if ($conn->query($anotherInsert) === true) {
                $response = array('success' => 'User added successfully');
            } else {
                $response = array('error' => 'User added failed');
            }
        } else {
            $response = array('error' => 'Error adding user: ' . $conn->error);
            
        }
    }
}
echo json_encode($response);
$conn->close();
