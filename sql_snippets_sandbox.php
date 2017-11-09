<?php
// sql to show databases
$query = "SHOW DATABASES";
$result = $conn->query($query);

echo "Connected.  Dumping DB list:<br>\n";
while($row = mysqli_fetch_assoc($result)) {
    echo $row['Database'] . "<br>\n";
}	       

// sql to create table
$sql = "CREATE TABLE courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
outside_course VARCHAR(50) NOT NULL,
outside_school VARCHAR(50) NOT NULL,
scu_course VARCHAR(50) NOT NULL,
equivalence VARCHAR(50) NOT NULL,
notes VARCHAR(500),
timestamp TIMESTAMP
)";

$unique_outside_courses = "
ALTER TABLE courses ADD UNIQUE (outside_school, outside_course, scu_course)";

if ($conn->query($sql) === TRUE) {
    echo "Table Courses created successfully<br>";
} else {
  	echo "Error creating table: " . $conn->error . "<br>";
}
?>