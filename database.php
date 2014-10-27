<?php
$conn = mysqli_connect("localhost", "root", "toor","test");
//check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 
