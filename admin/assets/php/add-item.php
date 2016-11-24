<?php

	include "../../../php/connect.php";

	date_default_timezone_set('Asia/Manila');

	$item_name = $_POST["item_name"];
	$supplier_name = $_POST["supplier_name"];
	$item_price = $_POST["item_price"];
	$stock = $_POST["stock"];

	$item_name = strtolower($item_name);
	$item_name = ucfirst($item_name);
	$supplier_name = strtolower($supplier_name);
	$supplier_name = ucfirst($supplier_name);
	$date = date("Y-m-d H:i:s");

	$sql2 = "SELECT * FROM items WHERE item_name = '$item_name'";
	$result = mysqli_query($conn, $sql2);
	$rows = mysqli_num_rows($result);

	$items = mysqli_fetch_assoc($result);

		$date_update = date("Y-m-d H:i:s");
		$totalNew = $stock + $items['stock'];
		$fetchedItemName = $items['item_name'];
		$fetchedItemID = $items['item_id'];

	if($rows > 0){
		$sql3 = "UPDATE items SET stock = '$totalNew', date_added = '$date_update' WHERE item_name = '$fetchedItemName'";
		$result1 = mysqli_query($conn, $sql3);
		$newItems = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
		$supplierName = $newItems['supplier_name'];
		$itemPrice = $newItems['price'];
		$sql4 = "INSERT INTO log_item(date_added, item_name, supplier_name, price, stock, total) VALUES ('$date', '$item_name', '$supplierName', $itemPrice, '$stock', '$totalNew')";
		$result2 = mysqli_query($conn, $sql4);

		if($result && $result2){
			echo "existSuccess";
		}else{
			echo "Error: " . mysqli_error($conn);
		}
	}else{
		$sql = "INSERT INTO items(date_added, item_name, supplier_name, price, stock) VALUES ('$date', '$item_name', '$supplier_name', '$item_price', '$stock')";
		$sql5 = "INSERT INTO log_item(date_added, item_name, supplier_name, price, stock, total) VALUES ('$date', '$item_name', '$supplier_name', '$item_price', '$stock', '$totalNew')";
		$result3 = mysqli_query($conn, $sql);
		$result4 = mysqli_query($conn, $sql5);

		if($result3 && $result4){
			echo "success";
		} else {
			echo "error";
		}
	}


?>