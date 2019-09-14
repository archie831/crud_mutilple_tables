<?php
//including the database connection file
include_once("../config.php");
//fetching data
$result = $dbConn->query("SELECT * FROM orders");

//Customers PDO to Customers JSON
$cSelect = $dbConn->query("SELECT cid, cName from customers");
$cArray = $cSelect->fetchAll(PDO::FETCH_ASSOC);
$cJson = json_encode($cArray);

echo $cJson
?>