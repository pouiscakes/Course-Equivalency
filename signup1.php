<?php
  require 'dbserver_info.php';
  session_start();
  $_SESSION['message'] = ' ';

  // Create connection
  $conn = new mysqli($servername, $username, $password, $db_name);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if ($_POST['password'] == $_POST['confirmpassword']){
   
    $username = $conn->real_escape_string($_POST['username']);
    $salt = "alsdbgoi24338hfnvoaisbet98gnv46zruyvib3r8";
    $password = $_POST['password'].$salt;
    $password = sha1($password);

    $sql = "INSERT INTO users (username, password) 
        VALUES ('$username', '$password')";

    if ($conn->query($sql) === true){
      $_SESSION['message'] = "Registration successful. Added $username to the database.";
      $_SESSION['login_user'] = $username;
      header("location: login.php");
    }
    else {
      $_SESSION['message'] = "User could not be added to the database! Username may already exist.";
    }
  }
  else{
    $_SESSION['message'] = "Passwords do not match!";
  }
}

  


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Course Equivalence</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
  </head>

  <body>
    <div class="container">

      <form class="form-signup" id="usersignup" name="usersignup" method="post" action="signup1.php">
        <h2 class="form-signup-heading">Create an Account</h2>
        <div class="alert alert-error"><?= $_SESSION['message']?></div>
        <input name="username" id="username" type="text" class="form-control" placeholder="Username" required>
        <input name="password" id="password" type="password" class="form-control" placeholder="Password" required>
        <input name="confirmpassword" id="confirmpassword" type="password" class="form-control" placeholder="Confirm Password" required><br>


        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>

        <div id="message"></div>
      </form>
    </div>