<?php
	include "connect.php";

	$items = "SELECT * FROM items";
	$remainingItems = "SELECT SUM(stock) AS stock_sum FROM items";
	$soldItems = "SELECT SUM(qty) AS sales_sum FROM sales";
	$result = mysqli_query($conn, $items);
	$result2 = mysqli_query($conn, $remainingItems);
	$result3 = mysqli_query($conn, $soldItems);

	$countSoldItems = mysqli_fetch_assoc($result3);
	$countRemItems = mysqli_fetch_assoc($result2);
	$countItems = mysqli_num_rows($result);
?>