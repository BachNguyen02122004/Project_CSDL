<?php
    //to connect the database server

    function connectDB($host = "localhost", $user = "root", $password = "123456", $database = "os") {
        $conn = mysqli_connect($host,$user,$password,$database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "successfully connect.<br>";

        return $conn;
    }

    //to add something to some table in the database
    function addData($conn, $table, $columns_datas_pair) {
        $columns = array_keys($columns_datas_pair);
        $datas = array_values($columns_datas_pair);

        $columnList = implode(', ', $columns);
        $valuePlaceholders = implode(', ', array_fill(0, count($columns), '?'));

        $query = "INSERT INTO $table ($columnList) VALUES ($valuePlaceholders)";

        $stmt = $conn->prepare($query);
        if (!$stmt) {
            echo "Error preparing statement: " . $conn->error;
            return;
        }

        $type = "";
        foreach ($datas as $data) {
            if (is_string($data)) {
                $type = $type. "s";
            }
            else if (is_int($data)) {
                $type = $type. "i";
            }
            else if (is_float($data)) {
                $type = $type. "d";
            }
            else if (is_resource($data)) {
                $type = $type. "b";
            }
        }
        $stmt->bind_param($type, ...$datas);

        if ($stmt->execute()) {
            echo "Data inserted successfully!<br>";
        } else {
            echo "Error inserting data: " . $stmt->error ."<br>";
        }

        $stmt->close();
    }

    function deleteData($conn, $table, $id) {
        $query = "DELETE FROM " . $table . " WHERE ID = ?";
        $stmt = $conn->prepare($query);

        $type='';
        if (is_string($id)) {
            $type = $type."s";
        }
        else if (is_int($id)) {
            $type = $type."i";
        }
        else if (is_float($id)) {
            $type = $type."d";
        }
        else if (is_resource($id)) {
            $type = $type."b";
        }

        $stmt->bind_param($type, $id);

        if ($stmt->execute()) {
            echo "Data delete successfully!<br>";
        } else {
            echo "Error deleting data: " . $stmt->error ."<br>";
        }

        if (!$stmt->execute()) {
            echo "Error delete data: " . $stmt->error."<br>";
        }

        $stmt->close();
    }

    function checkData($conn, $table) {
        $query = "SELECT * FROM ". $table;
        
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result)>0) {
            $fields = mysqli_fetch_fields($result);

            while ($row = mysqli_fetch_assoc($result)) {
                $output="";
                foreach ($fields as $field) {
                    $output .= $field->name . ": " . $row[$field->name] . " ";
                }
                $output .= "<br>";                
                echo $output;
            }
        }
    }

?>