<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php

//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
    $cName = $_POST['cName'];
	$cContact = $_POST['cContact'];
    $cAddress = $_POST['cAddress'];
	date_default_timezone_set('Asia/Manila');
    $cDateAdded = date("Y/m/d h:i:s A", time());
		
	// checking empty fields
	if(empty($cName) || empty($cContact) || empty($cAddress)) {
						
		if(empty($cName)) {
			echo "<font color='red'>Customer name field is empty.</font><br/>";
		}
		if(empty($cContact)) {
			echo "<font color='red'>Customer contact field is empty.</font><br/>";
		}
		if(empty($cAddress)) {
			echo "<font color='red'>User ID field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO customers(cName, cContact, cAddress, cDateAdded) VALUES(:cName, :cContact, :cAddress, :cDateAdded)";
        $query = $dbConn->prepare($sql);
		
		$query->bindparam(':cName', $cName);
		$query->bindparam(':cContact', $cContact);
		$query->bindparam(':cAddress', $cAddress);
        $query->bindparam(':cDateAdded', $cDateAdded);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='customer.php'>View Result</a>";
	}
}
?>
</body>
</html>





