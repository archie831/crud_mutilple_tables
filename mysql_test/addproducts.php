<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php

//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$pname = $_POST['pname'];
	$pdesc = $_POST['pdesc'];
	$pPrice = $_POST['pPrice'];
	$pStock = $_POST['pStock'];
		
	// checking empty fields
	if( empty($pname) || empty($pdesc) || empty($pPrice) || empty($pStock)) {
				
		if(empty($pname)) {
			echo "<font color='red'>Product Name field is empty.</font><br/>";
		}
		if(empty($pdesc)) {
			echo "<font color='red'>Product Description field is empty.</font><br/>";
		}
		if(empty($pPrice)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
		if(empty($pStock)) {
			echo "<font color='red'>Stock field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO products( pname, pdesc, pPrice, pStock) VALUES( :pname, :pdesc, :pPrice, :pStock)";
		$query = $dbConn->prepare($sql);

		$query->bindparam(':pname', $pname);
		$query->bindparam(':pdesc', $pdesc);
		$query->bindparam(':pPrice', $pPrice);
		$query->bindparam(':pStock', $pStock);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='products.php'>View Result</a>";
	}
}
?>
</body>
</html>



