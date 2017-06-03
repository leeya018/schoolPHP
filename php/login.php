<?php 
require 'configDB.php';
session_start();

if(isset($_SESSION["userName"]) ){//if the session is exist
	echo $_SESSION["userName"];
	header('Location: index.php');
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST["submit"])){
		// if(!empty($_POST["firstName"]){

		if(!empty($_POST["userName"]) || !empty($_POST["password"]) ){
			$sql = "SELECT * FROM users WHERE userName = '".$_POST["userName"]."'" and "password = '".md5($_POST["password"])."'";

			$result = $conn->query($sql);
			$row_num = $result->num_rows;
			if($row_num > 0){
				// echo "fsafdsafdsa";
				$row = $result->fetch_assoc();
				// print_r($row) ;
				$_SESSION["userName"] = $row["userName"];
				$_SESSION["firstName"] = $row["firstName"];
				$_SESSION["lastName"] = $row["lastName"];
				// header('Location: index.php');
			}else{
				echo "user or password are not correct";
			}

		}else{
			echo "all fields need to init";
		}
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="container">
	<h2>login</h2>
	<form method="post" enctype="multipart/form-data" >
		<input type="text" name="userName" placeholder="enter user name"  class="form-control"><br>
		<input type="text" name="password" placeholder="enter password"  class="form-control"><br>
		<input type="submit" name="submit" value="login" class="btn btn-primary">
	</form>
		<a href="registration.php">not register?</a>
</body>
</html>