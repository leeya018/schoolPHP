<?php 
require 'configDB.php';
session_start();

$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstName VARCHAR(30) NOT NULL,
lastName VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
userName VARCHAR(50) NOT NULL,
picture VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

if (!$conn) {
	die("Connection failed: " .  $conn->connect_error);
}
    // use exec() because no results are returned
if($conn->query($sql)){
	echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>