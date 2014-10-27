<?PHP
require 'database.php';
//input variables
$inGame = (isset($_POST["gaming"]) ? 1 : 0); 
$inDesign = (isset($_POST["design"]) ? 1 : 0); 
$inSocial = (isset($_POST["social"]) ? 1 : 0); 
$inOffice = (isset($_POST["office"]) ? 1 : 0);
$inHome = (isset($_POST["home"]) ? 1 : 0); 
$sql = "SELECT Name FROM computers WHERE Gaming = $inGame AND Design = $inDesign AND Social = $inSocial AND Office = $inOffice AND Home = $inHome";
//echo $sql;
//submit query
/*
if (mysqli_query($conn, $sql)) {
    echo "Database query succeeded.";
} else {
    //print errors
    echo "Error creating table: " . mysqli_error($conn);
    return 1;
}
*/
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
  echo $row['Name'];
  echo "<br>";
}
mysqli_close($conn);
?>
