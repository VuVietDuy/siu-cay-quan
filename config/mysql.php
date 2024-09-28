<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "root";
$database = "order_system";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// $sql = "CREATE DATABASE siu_cay_quan";
// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $conn->error;
// }
// $conn->close();
?>