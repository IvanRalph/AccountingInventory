<?php
include "../../../php/connect.php";

$item_selected = $_POST["item_selected"];

$sql = "SELECT stock, price from items where item_name = '".$item_selected."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if($result){
	$qty = $row["stock"];
	$price = $row["price"];
	$send = array("stock"=>$qty, "price"=>$price);
	echo json_encode($send);
}

?>