<?php
require 'dbserver_info.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/main.css" rel="stylesheet" media="screen">
  </head>

  <body>
    <div class="container">

      <form class="form-signup" id="usersignup" name="usersignup" method="post" action="signup.php">
        <h2 class="form-signup-heading">Register</h2>
        <input name="username" id="username" type="text" class="form-control" placeholder="Username" autofocus><br>
        <input name="password" id="password" type="password" class="form-control" placeholder="Password"><br>

        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>

        <div id="message"></div>
      </form>
    </div>

<?php
  // Create connection
  $conn = new mysqli($servername, $username, $password, $db_name);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  function NewUser(){
      $username = $_POST['username'];
      $password1 = $_POST['password'];

      if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO users (full_name, last_name, newuser, email, password1) 
        VALUES ($username, $password)";

        if ($conn->query($sql) == TRUE){
          echo "Your reigstration is complete.";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      } else {
        echo "Error: One or more required fields missing in form<br>";
      }
    }

  function SignUp(){
    if (!empty($_POST['username']) && !empty($_POST['password'])){
      $sql = mysql_query("SELECT * FROM users WHERE username = '$_POST[username]' AND password = '$_POST[password]' ");

      if(!$row = mysql_fetch_array($sql) or die(mysql_error()))
        NewUser();
      else
        echo "Username already registered.";
    }
  }

  if (isset($_POST['submit']))
    SignUp();
?>

  </body>
</html>


  