<?php  
require 'dbserver_info.php';
 $conn = new mysqli($servername, $username, $password, $db_name);
 
 $output = '';
// sql to select data
$sql = "SELECT id, outside_school, outside_course, scu_course, equivalence, notes FROM courses";
$result = $conn->query($sql);

$output .= "
    <table id='course_list'>
        <tr class='table_header'>
          <th>Outside School</th>
          <th>Outside Course</th>
          <th>SCU Course</th>
          <th>Equivalent</th>
          <th>Notes</th>
          <th>Delete</th>
        </tr>";
if ($result->num_rows > 0) {
  
    // output data of each row in table
    while($row = $result->fetch_assoc()) {
      $output .= '
        <tr>
          <td class="outside_school" data-id1="'.$row["id"].'" contenteditable>' . $row["outside_school"] . '</td>
          <td class="outside_course" data-id2="'.$row["id"].'" contenteditable>' . $row["outside_course"] . '</td>
          <td class="scu_course" data-id3="'.$row["id"].'" contenteditable>' . $row["scu_course"] . '</td>
          <td class="equivalence" data-id4="'.$row["id"].'" contenteditable>' . $row["equivalence"] . '</td>
          <td class="notes" data-id5="'.$row["id"].'" contenteditable>' . $row["notes"] . '</td>
          <td><button type="button" name="delete_btn" data-id6="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>
        </tr>'; 
    }
    $output .= "</table>";
} else {
    $output .= "0 results";
}
echo $output;
 ?>