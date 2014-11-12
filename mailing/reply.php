<?PHP
   	 require '../database.php';
    
	//sanitize input
	function clean($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
      		return $data;
    	}

    	$email =  clean($_POST["email"]);
    	$sql = "INSERT INTO mail (email) VALUES (\"$email\")";
    	/*
	$check = "SELECT email FROM mail WHERE email = $email";

	//query db
	//old crappy check duplicate code
	$result = mysqli_query($conn, $check);
   	 while($row = mysqli_fetch_array($result)) {
       		 if($row['email'] == $email){
       		     echo "<script>alert(\"Your email is already subscribed\");</script>";
		     return 1;
		}
	}
	*/
    	if (mysqli_query($conn, $sql)) {
        	// echo "Database query succeeded.";
        	 echo "<script>alert(\"Email added to mailing list.\");</script>";
	 
		} else {
        		//print errors
			//echo "Error querying database: " . mysqli_error($conn);
        	  	echo "<script>alert(\"This email is already in the mailing list.\");</script>";
    		}
    mysqli_close($conn);

?>
