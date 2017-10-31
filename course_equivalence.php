<?php
require 'dbserver_info.php';
$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start(); // must start session before any HTML
$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($conn,"select username from users where username = '$user_check' ");
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session = $row['username'];
if(!isset($_SESSION['login_user'])){
  header("location:login.php");
}
?>

<script>
window.alert = function(msg) {
    console.log(msg);
}
</script>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Course Equivalence</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/style_courses.css" rel="stylesheet" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="courses_filter_search.js"></script>
  </head>
  <body>
  	<h1> COEN Graduate Course Equivalence</h1>
 <?php
  if(true) { // ADD LOGIC FOR CHECKING USER PERMISSION HERE
    require 'add_course_form.php';
  }
  ?>

<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    
// Check POST requests
if( !empty($_POST['outside_school']) ) $outside_school = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['outside_school']));
if( !empty($_POST['outside_course']) ) $outside_course = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['outside_course']));
if( !empty($_POST['scu_course']) ) $scu_course = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['scu_course']));
if( !empty($_POST['equivalent']) ) $equivalent = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['equivalent']));
if( !empty($_POST['notes']) ) {
	$notes = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['notes']));
} else{
	$notes = "";
}

//sql to insert data
if (!empty($outside_school) && !empty($outside_course) &&
 	!empty($scu_course) && !empty($equivalent)) {
	$sql = "INSERT INTO courses (outside_school, outside_course, scu_course, equivalence, notes)
	VALUES ('$outside_school', '$outside_course', '$scu_course', '$equivalent', '$notes')";

	if ($conn->query($sql) === TRUE) {
	    // echo "New record created successfully<br>";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
} else {
	if(!empty($equivalent))
		echo "<div class='error'>Error: One or more required fields missing in form</div><br>";
}
?>

	<input type="text" id="course_search" name="course_search" onkeyup="filterSearch()" placeholder="🔍 Search" />

  <div id="live_data"></div> 

<?php
mysqli_close($conn);
?>

  </body>
</html>


<script>  
// JavaScript and jQuery for editing data in tables
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data(); 
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
           });  
      }  
      $(document).on('blur', '.outside_school', function(){  
           var id = $(this).data("id1");  
           var outside_school = $(this).text();  
           edit_data(id, outside_school, "outside_school");  
      });  
      $(document).on('blur', '.outside_course', function(){  
           var id = $(this).data("id2");  
           var outside_course = $(this).text();  
           edit_data(id,outside_course, "outside_course");  
      });
      $(document).on('blur', '.scu_course', function(){  
           var id = $(this).data("id3");  
           var scu_course = $(this).text();  
           edit_data(id,scu_course, "scu_course");  
      }); 
      $(document).on('blur', '.equivalence', function(){  
           var id = $(this).data("id4");  
           var equivalence = $(this).text();  
           edit_data(id,equivalence, "equivalence");  
      }); 
      $(document).on('blur', '.notes', function(){  
           var id = $(this).data("id5");  
           var notes = $(this).text();  
           edit_data(id,notes, "notes");  
      });
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id6");  
           // if(confirm("Are you sure you want to delete this?"))  
           // {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          // alert(data);  
                          fetch_data();  
                     }  
                });  
           // }  
      });   
 });  
 </script>