<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php

//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$uUsername = $_POST['uUsername'];
	$uPassword = $_POST['pw'];
	date_default_timezone_set('Asia/Manila');
    $uDateAdded = date("Y/m/d h:i:s A", time());
		
	// checking empty fields
	if(empty($uUsername) || empty($uPassword)) {
		
		if(empty($uUsername)) {
			echo "<font color='red'>Username field is empty.</font><br/>";
		}
		
		if(empty($uPassword)) {
			echo "<font color='red'>Password field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
        $sql = "INSERT INTO users(uUsername, uPassword, uDateAdded) VALUES(:uUsername, md5(:uPassword), :uDateAdded)";
		$query = $dbConn->prepare($sql);
        
		$query->bindparam(':uUsername', $uUsername);
        $query->bindparam(':uPassword', $uPassword);
        $query->bindparam(':uDateAdded', $uDateAdded);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='user.php'>View Result</a>";
	}
}
?>
</body>
</html>



