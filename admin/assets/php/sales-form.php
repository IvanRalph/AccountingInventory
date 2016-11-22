<?php
	include "../../../php/connect.php";

	$item_name = $_POST["item_name"];
	$qty = $_POST["qty"];
	$total = trim($_POST["total"], "PHP");
	$branch = $_POST["branch"];

	$sql = "UPDATE items SET stock = stock - '$qty' WHERE item_name = '$item_name';";
	$sql .= "INSERT INTO sales (item_name, qty, total, branch) VALUES ('$item_name', '$qty', '$total', '$branch')";

	if(mysqli_multi_query($conn, $sql)){
		echo "success";
	} else {
		echo "error";
	}
?>