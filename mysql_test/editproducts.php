<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])){
	$pId = $_POST['pId'];
	$pName = $_POST['pName'];
    $pDesc = $_POST['pDesc'];
    $pPrice = $_POST['pPrice'];
    $pStock = $_POST['pStock'];
		
	// checking empty fields
	if(empty($pName) || empty($pDesc) || empty($pPrice) || empty($pStock) ) {
		
		if(empty($pName)) {
			echo "<font color='red'>Product name field is empty.</font><br/>";
		}
		if(empty($pDesc)) {
			echo "<font color='red'>Product Description field is empty.</font><br/>";
        }
        if(empty($pPrice)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
        }
        if(empty($pStock)) {
			echo "<font color='red'>Stock field is empty.</font><br/>";
		}
		
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
        $sql = "UPDATE products SET pName=:pName, pDesc=:pDesc, pPrice=:pPrice, pStock=:pStock  WHERE pId=:pId";
		$query = $dbConn->prepare($sql);
        
        $query->bindparam(':pId', $pId);
		$query->bindparam(':pName', $pName);
        $query->bindparam(':pDesc', $pDesc);
        $query->bindparam(':pPrice', $pPrice);
        $query->bindparam(':pStock', $pStock);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data edited successfully.";
		echo "<br/><a href='products.php'>View Result</a>";
	}
}
?>