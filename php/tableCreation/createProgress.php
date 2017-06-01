<?php 
require 'configDB.php';
session_start();

$sql = "CREATE TABLE progress (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
action VARCHAR(30) NOT NULL,
level INT(30) NOT NULL,
correctAns INT(50) NOT NULL,
wrongAns INT(50) NOT NULL,
reg_date TIMESTAMP
)";

if (!$conn) {
	die("Connection failed: " .  $conn->connect_error);
}
    // use exec() because no results are returned
if($conn->query($sql)){
	echo "Table progress created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>