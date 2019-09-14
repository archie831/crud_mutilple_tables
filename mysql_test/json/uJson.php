<?php
//including the database connection file
include_once("../config.php");
//fetching data
$result = $dbConn->query("SELECT * FROM users");

//Users PDO to Users JSON
$uSelect = $dbConn->query("SELECT uid, uUsername from users");
$uArray = $uSelect->fetchAll(PDO::FETCH_ASSOC);
$uJson = json_encode($uArray);

echo $uJson
?>