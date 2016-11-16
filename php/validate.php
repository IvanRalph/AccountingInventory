<?php

	include "connect.php";

	$username = $_POST["username"];
	$password = $_POST["password"];

	$sql = "SELECT name FROM user WHERE username = '$username' and password = '$password'";
	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_assoc($result);

	if(mysqli_num_rows($result) == 1){
		$success = array("success"=>"true", "name"=>$row['name']);
		echo json_encode($success);
	}else{
		$fail = array("success"=>"false");
		echo json_encode($fail);
	}
?>
