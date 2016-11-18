<?php
	session_start();
	$_SESSION['isLogged'] = false;

	include "connect.php";

	$username = $_POST["username"];
	$password = $_POST["password"];

	$sql = "SELECT name FROM user WHERE username = '$username' and password = '$password'";
	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_assoc($result);

	if(mysqli_num_rows($result) == 1){
		$success = array("success"=>"true", "name"=>$row['name']);
		echo json_encode($success);
		$_SESSION['isLogged'] = true;
		$_SESSION['previous-page'] = "dashboard";
		$_SESSION['user-name'] = $row['name'];
	}else{
		$fail = array("success"=>"false");
		echo json_encode($fail);
		$_SESSION['isLogged'] = false;
	}
?>
