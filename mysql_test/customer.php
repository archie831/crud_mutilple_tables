<html>
<head>
	<title>Customers</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)

$result = $dbConn->query("SELECT * FROM customers order by cId DESC");
?>

	<a href="index.php"><button type="button" class="btn btn-dark"><i class='fas fa-home'></i>Home</button></a>
	<br/><br/>

	<h3>Add New Customer</h3>

	<form action="addcustomers.php" method="post" name="form">
		<div class="form-group">
			<label for="cName">Customer Name</label>
			<input type="text" class="form-control" id="cName" placeholder="Customer name" name="cName" required>
			<small class="form-text text-muted displayErr" id="custErr"></small>
		</div>
		<div class="form-group">
			<label for="tel">Cellphone Number</label>
			<input type="tel" class="form-control" id="tel" pattern="^(09|\+639)\d{9}$" placeholder="Format: 0922111999 or +63922111999" name="cContact" required>
		</div>
		<div class="form-group">
			<label for="address">Address</label>
			<input type="text" class="form-control" id="address" placeholder="Address" name="cAddress" required>
			<small class="form-text text-muted displayErr" id="addressErr"></small>
		</div>

		<button type="submit" class="btn btn-primary" name="Submit" id="submit"><i class='far fa-user'></i>Add Customer</button>
	</form>
	<br>

	<h3>All Customers</h3>
	<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
        <th>Customer ID</th>
		<th>Customer Name</th>
		<th>Customer Contact</th>
		<th>Customer Address</th>
        <th>Date Added</th>
		<th scope="col">Action</th>
		</tr>
	</thead>

  <tbody>
	<?php 	
		while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
			echo "<tr>";
			echo "<td>".$row['cId']."</td>";
			echo "<td>".$row['cName']."</td>";
			echo "<td>".$row['cContact']."</td>";
			echo "<td>".$row['cAddress']."</td>";
			echo "<td>".$row['cDateAdded']."</td>";
			echo "<td class=\"noBreak\"><button type=\"button\" class=\"btn btn-primary\" data-target=\"#id$row[cId]\" data-toggle=\"modal\"><i class='far fa-edit'></i>Edit</button><button type=\"button\" class=\"btn btn-danger\" data-target=\"#del$row[cId]\" data-toggle=\"modal\"><i class='fas fa-trash-alt'></i>Delete</button></td>";

			/****** Edit Modal *****/
			echo "<div class=\"modal fade\" id=\"id$row[cId]\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
					<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
						<div class=\"modal-content\">
							<div class=\"modal-header\">
								<h5 class=\"modal-title\" id=\"editModalTitle\">Edit Customer Information</h5>
								<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
									<span aria-hidden=\"true\">&times;</span>
								</button>
							</div>
							<div class=\"modal-body\">	
							
								<form action=\"editcustomers.php\" method=\"post\" name=\"form\">
									<div class=\"form-group\">
										<label for=\"cName\">Customer Name</label>
										<input type=\"text\" class=\"form-control\" id=\"cName\" name=\"cName\" value=\"$row[cName]\" required>
										<small class=\"form-text text-muted displayErr\" id=\"custErr\"></small>
										<input type=\"hidden\" class=\"form-control\" name=\"cId\" value=\"$row[cId]\">
									</div>
									<div class=\"form-group\">
										<label for=\"tel\">Cellphone Number</label>
										<input type=\"tel\" class=\"form-control\" id=\"tel\" pattern=\"^(09|\+639)\d{9}$\" name=\"cContact\" value=\"$row[cContact]\" placeholder=\"Format: 0922111999 or +63922111999\" required>
									</div>
									<div class=\"form-group\">
										<label for=\"address\">Address</label>
										<input type=\"text\" class=\"form-control\" id=\"address\" name=\"cAddress\" value=\"$row[cAddress]\" required>
										<small class=\"form-text text-muted displayErr\" id=\"addressErr\"></small>
									</div>
									<div class=\"modal-footer\">
										<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
										<button type=\"submit\" class=\"btn btn-primary\" name=\"Submit\" id=\"submit\"><i class='far fa-user'></i>Save changes</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>";

			/****** Delete Modal *****/
			echo "<div class=\"modal fade\" id=\"del$row[cId]\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
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
								Are you sure you want to delete this customer? <h5>$row[cName]</h5>
							</div>
							<div class=\"modal-footer\">
								<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
								<a <a href=\"delcustomers.php?id=$row[cId]\"><button type=\"submit\" class=\"btn btn-danger\" id=\"submit\"><i class='fas fa-trash-alt'></i>Delete</button></a>
							</div>
						</div>
						</div>	
					</div>
				</div>";
		}
	?>
	</tbody>

<script src="assets/customerVal.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>