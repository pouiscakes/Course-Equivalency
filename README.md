# course-equivalency
PHP web application to help SCU faculty advisors maintain records for course equivalency 

## How to Setup
1. Clone the repository to your local machine
2. Enter the directory that you cloned
3. Create a file called dbserver_info.php 
```
vi dbserver_info.php
```
4. Insert the following code and replace values with your credentials
```
<?php
$servername = "[SERVER_NAME];
$username = "[USERNAME]";
$password = "[PASSWORD]";
$db_name = "[DATABASE_NAME]";
?>
```
5. Done! 


## File Descriptions

### course_equivalence.php 
Main application file. 

### courses_filter_search.js
Dynamic search filter JS function

### edit.php
Live table editing PHP function

### sql_snippets_sandbox.php
Just used once for creating the table in the database.
