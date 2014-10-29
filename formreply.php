<?PHP
require 'database.php';
$input = array(5);
//array of names for input variables that correspond to the mysql
$name[0]="Gaming";
$name[1]="Design";
$name[2]="Social";
$name[3]="Office";
$name[4]="Home";

//input variables
$input[0] = (isset($_POST["gaming"]) ? 1 : 0); 
$input[1] = (isset($_POST["design"]) ? 1 : 0); 
$input[2] = (isset($_POST["social"]) ? 1 : 0); 
$input[3] = (isset($_POST["office"]) ? 1 : 0);
$input[4] = (isset($_POST["home"]) ? 1 : 0); 
//creating SQL database query
$sql = "SELECT Name FROM computers WHERE ";
$counts = array_count_values($input);
$itt = 0;//itteration
for($x = 0; $x < 5; $x++){
	if($input[$x] == 1){
		$itt++;
		if($itt != $counts[1]){
			$sql .= $name[$x] . " = " . $input[$x] . " AND ";	
		}
		else {
			$sql .= $name[$x] . " = " . $input[$x];		
		}
	}
}
/*old query code with error output
if (mysqli_query($conn, $sql)) {
    echo "Database query succeeded.";
} else {
    //print errors
    echo "Error querying database: " . mysqli_error($conn);
    return 1;
}
*/
//query database
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
	//echo the Name element from every row
	echo $row['Name'];
	//newline
	echo "<br>";
}

mysqli_close($conn);
?>
