<?php

$conn = mysqli_connect("localhost", "root", "", "db_accounting");

if(!$conn){
	echo "Database not connected";
} 

?>