<?php
//including the database connection file
include("config.php");
//getting id of the data from url
$cId = $_GET['id'];
//deleting the row from table
$sql = "DELETE FROM customers WHERE cId=:cId";
$query = $dbConn->prepare($sql);
$query->execute(array(':cId' => $cId));

header("Location:customer.php");
?>