
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])){
    $oId= $_POST['oId'];
	$oNo = $_POST['oNo'];
	$cId = $_POST['cId'];
	$uId = $_POST['uId'];
    $pId = $_POST['pId'];
    $oQuantity = $_POST['oQuantity'];
		
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
		
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
        $sql = "UPDATE orders SET oNo=:oNo, cId=:cId, uId=:uId, pId=:pId, oQuantity=:oQuantity WHERE oId=:oId";
		$query = $dbConn->prepare($sql);

        $query->bindparam(':oId', $oId);
		$query->bindparam(':oNo', $oNo);
		$query->bindparam(':cId', $cId);
		$query->bindparam(':uId', $uId);
        $query->bindparam(':pId', $pId);
        $query->bindparam(':oQuantity', $oQuantity);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		echo "<font color='green'>Data edited successfully.";
        echo "<br/><a href='order.php'>View Result</a>";
        
        // $page = "order.php";
        // $msg = "Order edited successfully.";
        // header("Location:" . $page . "?msg=" . $msg);
	}
}
?>