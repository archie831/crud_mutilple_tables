
<?php
//including the database connection file
include_once("config.php");
//getting id from url
$oId = $_GET['id'];
//selecting data associated with this particular id
$sql = "SELECT * FROM orders WHERE oId=:oId";
$query = $dbConn->prepare($sql);
$query->execute(array(':oId' => $oId));
while($row = $query->fetch(PDO::FETCH_ASSOC)){
    $oId= $row['oId'];
	$oNo = $row ['oNo'];
	$cId = $row['cId'];
	$uId = $row ['uId'];
    $pId = $row ['pId'];
    $oQuantity = $row ['oQuantity'];
}
?>
<html>
<head>
	<title>Edit Order</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>

	<a href="order.php"><button type="button" class="btn btn-dark"><i class='fas fa-arrow-circle-left'></i>Go Back</button></a>
	<br/><br/>

	<h3 class="orderTitle">Edit Order number: <?php echo $oId ?></h3>
	<form action="updateorders.php" method="post" name="form">
		<div class="form-group">
			<label for="oNo">Order Number</label>
			<input type="number" class="form-control" id="oNo" name="oNo" value="<?php echo $oNo?>" placeholder="Example: 1001" required>
			<small class="form-text text-muted displayErr" id="quanErr"></small>
		</div>
		<input type="hidden" class="form-control" value="<?php echo $oId?>" name="oId">
		<div class="form-group">
			<label for="cId">Customer ID</label>
			<select class="form-control" id="cId" name="cId">
			<option ><?php echo $cId?></option>
			</select>
		</div>
		<div class="form-group">
			<label for="uId">User ID</label>
			<select class="form-control" id="uId" name="uId">
			<option><?php echo $uId?></option>
			</select>
		</div>
		<div class="form-group">
			<label for="pId">Product ID</label>
			<select class="form-control" id="pId" name="pId">
				<option><?php echo $pId?></option>
			</select>
		</div>
		<div class="form-group">
			<label for="oQuantity">Order Quantity</label>
			<input type="number" class="form-control" id="oQuantity" placeholder="Enter quantity" value="<?php echo $oQuantity  ?>" name="oQuantity" required>
			<small class="form-text text-muted displayErr" id="quanErr"></small>
		</div>

		<button type="submit" class="btn btn-primary" name="Submit" id="submit"><i class='fas fa-dollar-sign'></i></i>Save changes</button>
    </form>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="assets/orderVal.js"></script>
<script src="assets/ajax.js"></script>

</body>
</html>

