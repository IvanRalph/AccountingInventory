<?php
	include "connect.php";
	$sql = "SELECT * FROM items";
	$result = mysqli_query($conn, $sql);

	$rows = mysqli_num_rows($result);
?>