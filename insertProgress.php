
      <?php 


     require 'configDB.php';
   session_start();
$action = $_SESSION["action"];
$level = 2;
$correctAns = 2;
$wrongAns = 2;
        $sql= "INSERT INTO progress (action,level,correctAns,wrongAns) VALUES ('".$action."','".$level."','".$correctAns."','".$wrongAns."')";
        if($conn->query($sql)){
            echo "new row added to progress table" . "<br>";
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    ?>;