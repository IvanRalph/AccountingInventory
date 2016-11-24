<?php
	include "../../../php/connect.php";

	$item_name = $_POST["item_name"];
	$qty = $_POST["qty"];
	$total = trim($_POST["total"], "PHP");
	$branch = $_POST["branch"];
	$date = date("Y-m-d g:i:s");


	
	$sql = "SELECT price from items WHERE item_name = '$item_name';";
	
	if($result = mysqli_query($conn,$sql)){

		$row = mysqli_fetch_assoc($result);
		$price = $row["price"];

		$sql = "UPDATE items SET stock = stock - '$qty' WHERE item_name = '$item_name';";
		$sql .= "INSERT INTO sales (date_added, item_name, qty, price, total, branch) VALUES ('$date', '$item_name', '$qty', '$price', '$total', '$branch')";

		if(mysqli_multi_query($conn, $sql)){
			echo "success";
		}

	} else {
		echo "error";
	}
	

?>