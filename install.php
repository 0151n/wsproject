<?php
//this file sets up a database for use with this 
//project and should be run once to initialize a
//table after a database "test" has been created

require 'database.php';

//sql query for creating table
$sql = "CREATE TABLE computers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Gaming BOOLEAN,
Design BOOLEAN,
Social BOOLEAN,
Office BOOLEAN,
Home BOOLEAN
)";

//submit query
if (mysqli_query($conn, $sql)) {
    echo "Table computers created successfully";
} else {
    //print errors
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);

?> 
