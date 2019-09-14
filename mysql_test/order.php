<html>
<head>
	<title>Orders</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM orders order by oId DESC");
?>

	<a href="index.php"><button type="button" class="btn btn-dark"><i class='fas fa-home'></i>Home</button></a>
	<br/><br/>

	<h3>Create New Order</h3>
	<form action="addorders.php" method="post" name="form">
		<div class="form-group">
			<label for="oNo">Order Number</label>
			<input type="number" class="form-control" id="oNo" placeholder="Example: 1001" name="oNo" required>
			<small class="form-text text-muted displayErr" id="ordernoErr"></small>
		</div>
		<div class="form-group">
			<label for="cId">Customer ID</label>
			<select class="form-control" id="cId" name="cId">
				<option value="">Select a customer</option>
			</select>
		</div>
		<div class="form-group">
			<label for="uId">User ID</label>
			<select class="form-control" id="uId" name="uId">
				<option value="">Select a username</option>
			</select>
		</div>
		<div class="form-group">
			<label for="pId">Product ID</label>
			<select class="form-control" id="pId" name="pId">
				<option value="">Select a product</option>
			</select>
		</div>
		<div class="form-group">
			<label for="oQuantity">Order Quantity</label>
			<input type="number" class="form-control" id="oQuantity" placeholder="Enter quantity" name="oQuantity" required>
			<small class="form-text text-muted displayErr" id="quanErr"></small>
		</div>

		<button type="submit" class="btn btn-primary" name="Submit" id="submit"><i class='fas fa-dollar-sign'></i></i>Create Order</button>
	</form>
	<br>

	<h3>All Orders</h3>

	<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
        <th>Order ID</th>
		<th>Order Number</th>
		<th>Customer ID</th>
		<th>User ID</th>
		<th>Product ID</th>
        <th>Order Quantity</th>
		<th>Order Date</th>
		<th>Action</th>
		</tr>
	</thead>

	<tbody>
		<?php 	
			while($row = $result->fetch(PDO::FETCH_ASSOC)){ 		
				echo "<tr>";
				echo "<td>".$row['oId']."</td>";
				echo "<td>".$row['oNo']."</td>";
				echo "<td>".$row['cId']."</td>";
				echo "<td>".$row['uId']."</td>";
				echo "<td>".$row['pId']."</td>";
				echo "<td>".$row['oQuantity']."</td>";
				echo "<td>".$row['oDate']."</td>";
				echo "<td class=\"noBreak\"><a href=\"editorders.php?id=$row[oId]\"><button type=\"button\" class=\"btn btn-primary\" data-target=\"#id$row[oId]\" data-toggle=\"modal\"><i class='far fa-edit'></i>Edit</button></a><button type=\"button\" class=\"btn btn-danger\" data-target=\"#del$row[oId]\" data-toggle=\"modal\"><i class='fas fa-trash-alt'></i>Delete</button></td>";

				/****** Delete Modal *****/
			echo "<div class=\"modal fade\" id=\"del$row[oId]\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
					<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
						<div class=\"modal-content\">
							<div class=\"modal-header\">
							<h5 class=\"modal-title\" id=\"delModalTitle\">Delete User</h5>
						<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
							<span aria-hidden=\"true\">&times;</span>
						</button>
						</div>
						<div class=\"modal-content\">
							<div class=\"modal-body\">
								Are you sure you want to delete this order? <h5>Order ID: $row[oNo]</h5>
							</div>
							<div class=\"modal-footer\">
								<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
								<a <a href=\"delorders.php?id=$row[oId]\"><button type=\"submit\" class=\"btn btn-danger\" id=\"submit\"><i class='fas fa-trash-alt'></i>Delete</button></a>
							</div>
						</div>
						</div>
					</div>
				</div>";
			}
		?>
	</tbody>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="assets/orderVal.js"></script>
<script src="assets/ajax.js"></script>

</body>
</html>