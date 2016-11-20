<?php
	include "connect.php";

	$items = "SELECT * FROM items";
	$result = mysqli_query($conn, $items);

	$countItems = mysqli_num_rows($result);
?>