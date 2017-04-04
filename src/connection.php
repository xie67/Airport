<?php
$servername = "localhost";
$username = "root";
$password = "vagrant";
$DBname = "airport";
$conn = new mysqli($servername,$username,$password,$DBname);

if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}
?>


