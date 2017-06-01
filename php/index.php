<?php 
require 'configDB.php';
session_start();


?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<body class="container">
    <div class="btn pull-right">
<h2><?php echo "wellcome back "; ?>
<a href="profile.php?PID=<?php echo $_SESSION["userName"] ?>"><?php echo  $_SESSION["firstName"] . " " .$_SESSION["lastName"] ?></a></h2>

        <a href="../plusMinus.php"><h1>חיבור וחיסור</h1></a><br>
        <a href="../Kefel.html"><h1>כפל</h1></a>
    </div>

</body>
</html>