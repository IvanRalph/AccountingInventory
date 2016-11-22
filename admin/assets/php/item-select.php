<?php
include "../../../php/connect.php";

$item_selected = $_POST["item_selected"];

$sql = "SELECT stock from items where item_name = '".$item_selected."'";
$result = mysqli_query($conn, $sql);
if($result){
	while($row = mysqli_fetch_assoc($result)){
		$qty = $row["stock"]; 
		echo json_encode($qty);
	}
}

?>