<?php
require 'dbserver_info.php';
session_start(); // must start session before any HTML
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../css/main.css" rel="stylesheet" media="screen">
  </head>

  <body>
    <div class="container">

      <form class="form-signin" name="form1" method="post" action="login.php">
        <h2 class="form-signin-heading">COEN Graduate Course Equivalence</h2>
        <input name="myusername" id="myusername" type="text" class="form-control" placeholder="Username" autofocus>
        <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Password">
       
        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	    <a href="signup.php" name="Sign Up" id="signup" class="btn btn-lg btn-primary btn-block" type="submit">Create new account</a>

        <div id="message"></div>
      </form>
  
  <?php
  	// Create connection
	$conn = new mysqli($servername, $username, $password, $db_name);

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
  	if( !empty($_POST['myusername']) ) {
      $myusername = $_POST['myusername'];
    }
    if( !empty($_POST['mypassword']) ) {
      $mypassword = $_POST['mypassword'];
    }

    if( !empty($_POST['myusername']) && !empty($_POST['mypassword']) ) {

      $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = $conn->query($sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      // $active = $row['active'];

      $count = mysqli_num_rows($result);

      if($count == 1) {
      		// session_register("myusername");
      		$_SESSION['login_user'] = $myusername;

          header("location: course_equivalence.php");
      }else{
      	$error = "Your Login Name or Password is invalid";
      }
    }

  ?>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- The AJAX login script -->
    <script src="js/login.js"></script>

  </body>
</html>