<?PHP
require 'database.php';
//input and name array declaration
$input = $name =  array(5);

//sanitize input
function clean($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

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
$price =  clean($_POST["maxprice"]);
//creating SQL database query
$sql = "SELECT Name,price FROM computers WHERE ";
//count occurences of 1 in database to determine length of query
$counts = array_count_values($input);
$itt = 0;//itteration of loop that has added to query
//looping through input array
for($x = 0; $x < 5; $x++){
	//check if certain element is true
	if($input[$x] == 1){
		//increment counter
		$itt++;
		//check that loop is not on last itteration
		if($itt != $counts[1]){
			$sql .= $name[$x] . " = " . $input[$x] . " AND ";	
		}
		//append different string for last itteration(e.g. exlude AND)
		else {
			$sql .= $name[$x] . " = " . $input[$x];		
		}
	}
}
//check if price is set
if(!empty($price)){
	//add price check to end of sql
	$sql .= " AND price <= $price";
}
//query database
$result = mysqli_query($conn, $sql);
//return names of matches 
while($row = mysqli_fetch_array($result)) {
	//echo the Name and price elements from every row
	//along with some formatting
	echo "NAME: ";
	echo $row['Name'];
	echo " PRICE: ";
	echo $row['price'];
	//horizontal line
	echo "<hr>";
}

mysqli_close($conn);
?>
