<?php
require "../database.php";
//create sql query
$sql = "SELECT * FROM computers";
//query db
$result = mysqli_query($conn, $sql);
//return names of matches 
while($row = mysqli_fetch_array($result)) {
	//echo the elements from every row
	//along with some formatting
	echo "id: ";
	echo $row['id'];
	echo " gaming: ";
	echo $row['Gaming'];
	echo " design: ";
	echo $row['Design'];
	echo " social: ";
	echo $row['Social'];
	echo " office: ";
	echo $row['Office'];
	echo " home: ";
	echo $row['Home'];
	echo " NAME: ";
	echo $row['Name'];
	echo " PRICE: ";
	echo $row['price'];
	//horizontal line
	echo "<hr>";
}
mysqli_close($conn);
?>
