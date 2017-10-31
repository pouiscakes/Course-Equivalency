<?php  
require 'dbserver_info.php';
 $connect = mysqli_connect($servername, $username, $password, $db_name);   
 $sql = "DELETE FROM courses WHERE id = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>