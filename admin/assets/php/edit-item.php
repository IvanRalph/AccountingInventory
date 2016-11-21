<?php
	include "../../../php/connect.php";

	$itemName = $_POST['item_name'];
	$supplier = $_POST['supplier_name'];
	$price = $_POST['item_price'];
	$itemID = $_POST['item_id'];

	$sql = "UPDATE items SET item_name = '$itemName', supplier_name = '$supplier', price = '$price' WHERE item_id = '$itemID'";
	$result = mysqli_query($conn, $sql);

	if($result){
		echo "success";
	}else{
		echo "queryError";
	}
?>