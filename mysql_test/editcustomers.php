
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
    $cId = $_POST['cId'];
	$cName = $_POST['cName'];
    $cContact = $_POST['cContact'];
    $cAddress = $_POST['cAddress'];
		
	// checking empty fields
	if(empty($cName) || empty($cContact) || empty($cAddress)) {
		
		if(empty($cName)) {
			echo "<font color='red'>Product name field is empty.</font><br/>";
		}
		if(empty($cContact)) {
			echo "<font color='red'>Product Description field is empty.</font><br/>";
        }
        if(empty($cAddress)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
        }
		
	} else { 
		// if all the fields are filled (not empty) 
		//insert data to database		
        $sql = "UPDATE customers SET cName=:cName, cContact=:cContact, cAddress=:cAddress WHERE cId=:cId";
		$query = $dbConn->prepare($sql);
        
        $query->bindparam(':cId', $cId);
		$query->bindparam(':cName', $cName);
        $query->bindparam(':cContact', $cContact);
        $query->bindparam(':cAddress', $cAddress);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data edited successfully.";
		echo "<br/><a href='customer.php'>View Result</a>";
	}
}
?>