<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT oNo, pname, pdesc, oQuantity, pPrice, uUsername, cName from orders o inner join products p on o.pid = p.pid inner join users u on o.uid = u.uid inner join customers c on o.cid = c.cid ORDER BY oNo DESC");

// $result = $dbConn->query("SELECT oNo, pname, pdesc, oQuantity, pPrice, uUsername, cName, sum(oQuantity*pPrice) as 'subTotal' from orders o inner join products p on o.pid = p.pid inner join users u on o.uid = u.uid inner join customers c on o.cid = c.cid ORDER BY oNo ASC");
?>

<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>
	<a href="user.php"><button type="button" class="btn btn-dark"><i class='far fa-user'></i>Add/View Users</button></a>
	<a href="order.php"><button type="button" class="btn btn-dark"><i class='fas fa-cart-plus'></i>Create/View Orders</button></a>
	<a href="products.php"><button type="button" class="btn btn-dark"><i class='fas fa-box-open'></i>Add/View Products</button></a>
	<a href="customer.php"><button type="button" class="btn btn-dark"><i class='far fa-user'></i>Add/View Customers</button></a>
	<br><br><br>

	<h3>Sold Products</h3>
	<table class="table table-striped">
		<thead class="thead-dark">
			<tr>
			<th>Order number</th>
			<th>Product Name</th>
			<th>Description</th>
			<th>Order Quantity</th>
			<th>Price</th>
			<th>Customer name</th>
			<th>Username</th>
			<!-- <th>Sub Total</th> -->
			</tr>
		</thead>

		<tbody>
			<?php 	
				while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
					echo "<tr>";
					echo "<td>".$row['oNo']."</td>";
					echo "<td>".$row['pname']."</td>";
					echo "<td>".$row['pdesc']."</td>";
					echo "<td>".$row['oQuantity']."</td>";
					echo "<td>".$row['pPrice']."</td>";
					echo "<td>".$row['cName']."</td>";
					echo "<td>".$row['uUsername']."</td>";
					// echo "<td>".$row['subTotal']."</td>";
				}
			?>
		</tbody>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

