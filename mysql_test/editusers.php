<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
    $uId = $_POST['uId'];
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

	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
        $sql = "UPDATE users SET uUsername=:uUsername, uPassword=md5(:uPassword) WHERE uId=:uId";
		$query = $dbConn->prepare($sql);
        
        $query->bindparam(':uId', $uId);
		$query->bindparam(':uUsername', $uUsername);
        $query->bindparam(':uPassword', $uPassword);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data edited successfully.";
		echo "<br/><a href='user.php'>View Result</a>";
	}
}
?>