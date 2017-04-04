<html>
<head>
	<h1>WeatherData table</h1>
</head>
<body>

<form>
	<form method="post">
		<input type="submit" name="submit_Export" value="EXPORT TO EXCEL"/>
</form>




<?php
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "weather";
$conn = mysqli_connect($servername,$username,$password,$DBname);

if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM WeatherData ORDER BY id";
$result = mysqli_query($conn,$query);
echo "<table border = 1>";
echo "All data in the database: ";
echo "<tr><td>id</td><td>date</td><td>temperature</td><td>location</td></tr>";
while ($row=mysqli_fetch_array($result)) {
	echo "<tr>";
	echo "<td>".$row["id"]."</td>";
	echo "<td>".$row["date"]."</td>";
	echo "<td>".$row["temperature"]."</td>";
	echo "<td>".$row["loaction"]."</td>";
	echo "</tr>";
}
?>

</body>
</html>

