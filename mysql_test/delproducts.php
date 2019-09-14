<?php
//including the database connection file
include("config.php");
//getting id of the data from url
$pid = $_GET['id'];
//deleting the row from table
$sql = "DELETE FROM products WHERE pid=:pid";
$query = $dbConn->prepare($sql);
$query->execute(array(':pid' => $pid));

header("Location:products.php");
?>