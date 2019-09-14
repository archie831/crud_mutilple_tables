<html>
<head>
	<title>Users</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>
	<?php
	//including the database connection file
	include_once("config.php");
	//fetching data in descending order (lastest entry first)
	$result = $dbConn->query("SELECT * FROM users order by uId DESC");
	?>
	
	<a href="index.php"><button type="button" class="btn btn-dark"><i class='fas fa-home'></i>Home</button></a>
	<br/><br/>
	<h3>Add New User</h3>
		
	<form action="addusers.php" method="post" name="form">
		<div class="form-group">
			<label for="userName">Username</label>
			<input type="text" class="form-control" id="userName" placeholder="Enter username" name="uUsername" required>
			<small class="form-text text-muted displayErr" id="usernameErr"></small>
		</div>
		<div class="form-group">
			<label for="pw">Password</label>
			<input type="password" class="form-control" id="pw" placeholder="Password" name="pw">
		</div>
		<div class="form-group">
			<label for="conPw">Confirm Password</label>
			<input type="password" class="form-control" id="conPw" placeholder="Password">
			<small class="form-text text-muted displayErr" id="pwErr"></small>
		</div>
		<button type="submit" class="btn btn-primary" name="Submit" id="submit"><i class='far fa-user'></i>Add User</button>
	</form>
	<br>

	<h3>All Users</h3>

	<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
		<th scope="col">User ID</th>
		<th scope="col">Username</th>
		<th scope="col">Password</th>
		<th scope="col">Date Added</th>
		<th scope="col">Action</th>
		</tr>
	</thead>

  <tbody>
	<?php 	
		while($row = $result->fetch(PDO::FETCH_ASSOC)){ 		
			echo "<tr>";
			echo "<td>".$row['uId']."</td>";
			echo "<td>".$row['uUsername']."</td>";
			echo "<td>".$row['uPassword']."</td>";
			echo "<td>".$row['uDateAdded']."</td>";
			echo "<td><button type=\"button\" class=\"btn btn-primary\" data-target=\"#id$row[uId]\" data-toggle=\"modal\"><i class='far fa-edit'></i>Edit</button><button type=\"button\" class=\"btn btn-danger\" data-target=\"#del$row[uId]\" data-toggle=\"modal\"><i class='fas fa-trash-alt'></i>Delete</button></td>";

			/****** Edit Modal *****/
			echo "<div class=\"modal fade\" id=\"id$row[uId]\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
				<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
				<div class=\"modal-content\">
					<div class=\"modal-header\">
					<h5 class=\"modal-title\" id=\"editModalTitle\">Edit User Information</h5>
					<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
						<span aria-hidden=\"true\">&times;</span>
					</button>
					</div>
					<div class=\"modal-body\">
					
					<form action=\"editusers.php\" method=\"post\" name=\"form\">
						<div class=\"form-group\">
							<label for=\"username\">Username</label>
							<input type=\"text\" class=\"form-control\" id=\"userName\" name=\"uUsername\" value=\"$row[uUsername]\" required>
							<small class=\"form-text text-muted displayErr\" id=\"usernameErr\"></small>
						</div>
							<div class=\"form-group\">
								<label for=\"pw\">New Password</label>
								<input type=\"text\" class=\"form-control\" id=\"pw\" name=\"pw\" placeholder=\"Enter new password\" required>
								<input type=\"hidden\" class=\"form-control\" name=\"uId\" value=\"$row[uId]\">
							</div>
						</div>
					<div class=\"modal-footer\">
					<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
					<button type=\"submit\" class=\"btn btn-primary\" name=\"Submit\" id=\"submit\"><i class='far fa-user'></i>Save changes</button>
					</div>
					</form>
				</div>
				</div>
			</div>";

			/****** Delete Modal *****/
			echo "<div class=\"modal fade\" id=\"del$row[uId]\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
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
									Are you sure you want to delete this user? <h5>$row[uUsername]</h5>
								</div>
								<div class=\"modal-footer\">
									<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
									<a <a href=\"delusers.php?id=$row[uId]\"><button type=\"submit\" class=\"btn btn-danger\" id=\"submit\"><i class='fas fa-trash-alt'></i>Delete</button></a>
								</div>
							</div>
							</div>
						</div>
					</div>";
		}
	?>
	</tbody>

<script src="assets/userVal.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>