<?php  
$servername = "dbserver.engr.scu.edu";
$username = "llin";
$password = "louislinsql";
$db_name = "sdb_llin";
 $connect = mysqli_connect($servername, $username, $password, $db_name);  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE courses SET ".$column_name."='".$text."' WHERE id='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>