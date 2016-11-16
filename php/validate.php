<?php

include "connect.php";

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT id, name, status FROM user WHERE username = '$username' and password = '$password'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)==1){
	while($row = mysqli_fetch_assoc($result)){
		$r[] = $row;
	}

echo json_encode($r);

} else {
	echo "error";
}


?>
