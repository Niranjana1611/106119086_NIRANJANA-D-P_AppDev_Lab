<?php
session_start(); 
include "db_conn.php";

$rollno=$_POST['rollno'];
$password=$_POST['password'];

$sql = "SELECT * FROM users WHERE rollnumber='$rollno' AND password='$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1) 
{
	header("Location: home.php");
}
else
{
	echo ("<html><head> <title>Login</title> <meta charset='UTF-'> <meta name='viewport' content='width=device-width, initial-scale=1.0'><style> body{ font-family: sans-serif; background: lightgreen; background-attachment: fixed; text-align: center;} div{ text-align: center; border: 5px outset black;background-color: White; width: 50%; padding: 10px; margin: auto; }</style> </head><body><br><br><br><div><br><b><i><h2><font color=red>INVALID CREDENTIALS</fonr></h2></i></b><br><br><a href='index.php'><input type='button' value='LOGIN AGAIN'></a><br><br></div><body></html>");
}
?>