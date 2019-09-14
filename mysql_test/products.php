<html>
<head>
	<title>Customers</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>
<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)

$result = $dbConn->query("SELECT * FROM products order by pId DESC");
?>

	<a href="index.php"><button type="button" class="btn btn-dark"><i class='fas fa-home'></i>Home</button></a>
	<br/><br/>

	<h3>Add New Product</h3>

	<form action="addproducts.php" method="post" name="form">
		<div class="form-group">
			<label for="pname">Product Name</label>
			<input type="text" class="form-control" id="pname" placeholder="Enter Product" name="pname">
		</div>
		<div class="form-group">
			<label for="pdesc">Description</label>
			<input type="text" class="form-control" id="pdesc" placeholder="Product description" name="pdesc">
		</div>
		<div class="form-group">
			<label for="pPrice">Price</label>
			<input type="text" class="form-control" id="pPrice" placeholder="Enter price" name="pPrice">
		</div>
		<div class="form-group">
			<label for="pStock">Stock</label>
			<input type="text" class="form-control" id="pStock" placeholder="Stocks available" name="pStock">
		</div>

		<button type="submit" class="btn btn-primary" name="Submit"><i class='fas fa-box-open'></i>Add Product</button>
	</form>
	<br>

	<h3>All Products</h3>
	<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
        <th>Product ID</th>
		<th>Product Name</th>
		<th>Description</th>
		<th>Price</th>
        <th>Stock</th>
		<th scope="col">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php 	
			while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
				echo "<tr>";
				echo "<td>".$row['pId']."</td>";
				echo "<td>".$row['pName']."</td>";
				echo "<td>".$row['pDesc']."</td>";
				echo "<td>".$row['pPrice']."</td>";
				echo "<td>".$row['pStock']."</td>";
				echo "<td class=\"noBreak\"><button type=\"button\" class=\"btn btn-primary\" data-target=\"#id$row[pId]\" data-toggle=\"modal\"><i class='far fa-edit'></i>Edit</button><button type=\"button\" class=\"btn btn-danger\" data-target=\"#del$row[pId]\" data-toggle=\"modal\"><i class='fas fa-trash-alt'></i>Delete</button></td>";

				/****** Edit Modal *****/
				echo "<div class=\"modal fade\" id=\"id$row[pId]\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
						<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
							<div class=\"modal-content\">
								<div class=\"modal-header\">
									<h5 class=\"modal-title\" id=\"editModalTitle\">Edit Product Information</h5>
									<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
										<span aria-hidden=\"true\">&times;</span>
									</button>
								</div>
								<div class=\"modal-body\">

								<form action=\"editproducts.php\" method=\"post\" name=\"form\">


									<div class=\"form-group\">
										<h5>Product ID: $row[pId]</h5>
										<input type=\"hidden\" class=\"form-control\" value=\"$row[pId]\" name=\"pId\">
									</div>

									<div class=\"form-group\">
										<label for=\"pname\">Product Name</label>
										<input type=\"text\" class=\"form-control\" id=\"pname\" value=\"$row[pName]\" name=\"pName\">
									</div>
									<div class=\"form-group\">
										<label for=\"pdesc\">Description</label>
										<input type=\"text\" class=\"form-control\" id=\"pdesc\" value=\"$row[pDesc]\" name=\"pDesc\">
									</div>
									<div class=\"form-group\">
										<label for=\"pPrice\">Price</label>
										<input type=\"text\" class=\"form-control\" id=\"pPrice\" value=\"$row[pPrice]\" name=\"pPrice\">
									</div>
									<div class=\"form-group\">
										<label for=\"pStock\">Stock</label>
										<input type=\"text\" class=\"form-control\" id=\"pStock\" value=\"$row[pStock]\" available\" name=\"pStock\">
									</div>
									<div class=\"modal-footer\">
										<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
										<button type=\"submit\" class=\"btn btn-primary\" name=\"Submit\"><i class='fas fa-box-open'></i>Save changes</button>
									</div>

									</form>
								</div>
							</div>
						</div>
					</div>";

				/****** Delete Modal *****/
				echo "<div class=\"modal fade\" id=\"del$row[pId]\" tabindex=\"-1\" role=\"dialog\" 				aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
						<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
							<div class=\"modal-content\">
								<div class=\"modal-header\">
									<h5 class=\"modal-title delModalTitle\" >Delete Product</h5>
									<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
										<span aria-hidden=\"true\">&times;</span>
									</button>
								</div>
								<div class=\"modal-content\">
									<div class=\"modal-body\">
										Are you sure you want to delete Product ID: $row[pId]? <h5>$row[pName]</h5>
									</div>
									<div class=\"modal-footer\">
										<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
										<a href=\"delproducts.php?id=$row[pId]\"><button type=\"submit\" class=\"btn btn-danger\" id=\"submit\"><i class='fas fa-trash-alt'></i>Delete</button></a>
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>