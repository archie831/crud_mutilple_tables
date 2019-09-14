<?php
//including the database connection file
include("config.php");
//getting id of the data from url
$uid = $_GET['id'];
//deleting the row from table
$sql = "DELETE FROM users WHERE uid=:uid";
$query = $dbConn->prepare($sql);
$query->execute(array(':uid' => $uid));

header("Location:user.php");
?>