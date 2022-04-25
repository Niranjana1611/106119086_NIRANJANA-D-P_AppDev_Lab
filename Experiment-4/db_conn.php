<?php

$sname= "localhost:3308";
$unmae= "root";
$password = "";
$db_name = "experiment4";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}