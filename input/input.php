<?php
//open db connection
require '../database.php';
//get input data
$gaming = (isset($_POST["gaming"]) ? 1 : 0); 
$design = (isset($_POST["design"]) ? 1 : 0); 
$social = (isset($_POST["social"]) ? 1 : 0); 
$office = (isset($_POST["office"]) ? 1 : 0);
$home = (isset($_POST["home"]) ? 1 : 0); 
$price = $_POST['price'];
$name = $_POST['name'];	
//create sql query
$sql = "INSERT INTO computers (Gaming,Design,Social,Office,Home,name,price) VALUES ($gaming,$design,$social,$office,$home,\"$name\",\"$price\")";	
//query db
if (mysqli_query($conn, $sql)) {
      echo "Database query succeeded.";
} else {
      //print errors
      echo "Error querying database: " . mysqli_error($conn);
      return 1;
}
//print link to database dump
echo "<br><a href=\"view.php\">View database</a>";
mysqli_close($conn);
?>
