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
        <input name="firstname" id ="firstname" type="text" class="form-control" placeholder="First Name"><br>
        <input name="lastname" id="lastname" type="text" class="form-control" placeholder="Last Name"><br>
        <input name="newuser" id="newuser" type="text" class="form-control" placeholder="Username" autofocus><br>
        <input name="email" id="email" type="text" class="form-control" placeholder="Email"><br>
        <input name="password1" id="password1" type="password" class="form-control" placeholder="Password"><br>
        <input name="password2" id="password2" type="password" class="form-control" placeholder="Repeat Password"><br>

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
      $first_name = $_POST['firstname'];
      $last_name = $_POST['lastname'];
      $username = $_POST['newuser'];
      $email = $_POST['email'];
      $password1 = $_POST['password1'];
      $password2 = $_POST['password2'];

      //check if passwords match
      if($password1 != $password2){
        echo "Password does not match";
        //empty out field 
      }
      if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['newuser']) && !empty($_POST['password1'])) {
        $sql = "INSERT INTO users (full_name, last_name, newuser, email, password1) 
        VALUES ($first_name, $last_name, $newuser, $email, $password)";

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
    if (!empty($_POST['newuser'])){
      $sql = mysql_query("SELECT * FROM users WHERE username = '$_POST[newuser]' AND password = '$_POST[password1]' ");

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


  