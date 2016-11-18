<?php
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inventory System - Login</title>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!--sweetalert-->
	<script type="text/javascript" src="js/sweetalert.min.js"></script>
	<link rel="stylesheet" href="css/sweetalert.css">

	<!--jQuery-->

	<!--bootstrap-->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<style>
		form{
			width:300px;
			border: 1px solid black;
			border-radius:5px;
			box-shadow: 5px 5px 5px #888888;
			padding: 10px;
		}

		.center{
			margin:0 auto;
			margin-top:10%;
		}

		.button{
			text-align:center;
		}

	</style>

</head>
<body>
	<div class="container">
		<form class="center">
			<div class="form-group">
				<label>Username:</label>
				<input type="text" class="form-control" id="username" required>
			</div>

			<div class="form-group">
				<label>Password:</label>
				<input type="password" class="form-control" id="password">
			</div>

			<div class="form-group button">
				<input type="submit" class="btn btn-primary" id="submit">
			</div>
		</form>
	</div>

<!--custom-->
	<script type="text/javascript" src="js/validate.js"></script>
</body>
</html>