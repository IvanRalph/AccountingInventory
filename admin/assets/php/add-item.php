<?php

include "../../../php/connect.php";

$item_name = $_POST["item_name"];
$supplier_name = $_POST["supplier_name"];
$item_price = $_POST["item_price"];
$stock = $_POST["stock"];

$sql = "INSERT INTO items(item_name, supplier_name, price, stock) VALUES ('$item_name', '$supplier_name', '$item_price', '$stock')";

if(mysqli_query($conn, $sql)){
	echo "success";
} else {
	echo "error";
}


?>