<?php
//including the database connection file
include("config.php");
//getting id of the data from url
$oid = $_GET['id'];
//deleting the row from table
$sql = "DELETE FROM orders WHERE oid=:oid";
$query = $dbConn->prepare($sql);
$query->execute(array(':oid' => $oid));

header("Location:order.php");
?>