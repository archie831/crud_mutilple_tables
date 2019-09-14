<?php
//including the database connection file
include_once("../config.php");
//fetching data
$result = $dbConn->query("SELECT * FROM products");

//Products PDO to Products JSON
$pSelect = $dbConn->query("SELECT pid, pName from products");
$pArray = $pSelect->fetchAll(PDO::FETCH_ASSOC);
$pJson = json_encode($pArray);

echo $pJson
?>