<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "scanner";

$conn = mysqli_connect($host,$user,$pass,$db);

if(!$conn){
	echo "Eror";
}


?>