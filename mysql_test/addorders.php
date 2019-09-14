<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php

//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$oNo = $_POST['oNo'];
	$cId = $_POST['cId'];
	$uId = $_POST['uId'];
    $pId = $_POST['pId'];
    $oQuantity = $_POST['oQuantity'];
	date_default_timezone_set('Asia/Manila');
    $oDate = date("Y/m/d h:i:s A", time());
		
	// checking empty fields
	if( empty($oNo) || empty($cId) || empty($uId) || empty($pId) || empty($oQuantity)) {
		
		if(empty($oNo)) {
			echo "<font color='red'>Order number field is empty.</font><br/>";
		}
		
		if(empty($cId)) {
			echo "<font color='red'>Customer ID field is empty.</font><br/>";
		}
		if(empty($uId)) {
			echo "<font color='red'>User ID field is empty.</font><br/>";
		}
		if(empty($pId)) {
			echo "<font color='red'>Product ID is empty.</font><br/>";
        }
        if(empty($oQuantity)) {
			echo "<font color='red'>Order quantity is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	}else{ 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO orders(oNo, cId, uId, pId, oQuantity, oDate) VALUES(:oNo, :cId, :uId, :pId, :oQuantity, :oDate)";
		$query = $dbConn->prepare($sql);
		
		$query->bindparam(':oNo', $oNo);
		$query->bindparam(':cId', $cId);
		$query->bindparam(':uId', $uId);
        $query->bindparam(':pId', $pId);
        $query->bindparam(':oQuantity', $oQuantity);
		$query->bindparam(':oDate', $oDate);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='order.php'>View Result</a>";
	}
}
?>
</body>
</html>





