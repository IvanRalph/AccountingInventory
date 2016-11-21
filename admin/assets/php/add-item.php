<?php

include "../../../php/connect.php";

$item_name = $_POST["item_name"];
$supplier_name = $_POST["supplier_name"];
$item_price = $_POST["item_price"];
$stock = $_POST["stock"];

$item_name = strtolower($item_name);
$item_name = ucfirst($item_name);
$supplier_name = strtolower($supplier_name);
$supplier_name = ucfirst($supplier_name);

$sql2 = "SELECT * FROM items WHERE item_name = '$item_name'";
$result = mysqli_query($conn, $sql2);
$rows = mysqli_num_rows($result);

$items = mysqli_fetch_assoc($result);

if($rows > 0){
	$totalNew = $stock + $items['stock'];
	$fetchedItemName = $items['item_name'];
	$sql3 = "UPDATE items SET stock = '$totalNew' WHERE item_name = '$fetchedItemName'";
	$result = mysqli_query($conn, $sql3);

	if($result){
		echo "existSuccess";
	}else{
		echo "existError";
	}
}else{
	$sql = "INSERT INTO items(item_name, supplier_name, price, stock) VALUES ('$item_name', '$supplier_name', '$item_price', '$stock')";

	if(mysqli_query($conn, $sql)){
		echo "success";
	} else {
		echo "error";
	}
}


?>