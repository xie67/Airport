<html>
<head>
	<h1>Temperature data</h1>
</head>
<body>
<tr><td>Enter the data you want to get:</td></tr>

<form method="post">
	Sensor position:
  	<input type="radio" name="position" value="Inside concrete" > Inside concrete
  	<input type="radio" name="position" value="Outside concrete"> Outside concrete <br>
    Transfer method:
	<input type="radio" name="transfer" value="Wired" > Wired
  	<input type="radio" name="transfer" value="Wireless"> Wireless <br>
  	Year-Month-Day (2017-02-01):
	<input type="text" name="date"> 
    <input type="submit" name="submit">
</form>



<?php
include '/src/connection.php';

$position = $_POST['position'];
$transfer = $_POST['transfer'];
$date = $_POST['date'];

$source_id = NULL;
if($position == "Inside concrete"){
	if($transfer == "Wired") $source_id = 1;
	else $source_id = 2;
}else{
	if($transfer == "Wired") $source_id = 3;
	else $source_id = 4;
}



$startDate = date('Y-m-d',strtotime($date));
$endDate = date('Y-m-d', strtotime($date.' +1 day'));

if($_POST['submit']){
	$sql = "select `temperature`,`datetime`,`source_name`,`location_name` from location join 
		(select `temperature`,`datetime`,`source_name`,`location_id` from temperature join source 
		on temperature.source_id = source.id 
		where `datetime` >= '$startDate' and `datetime` < '$endDate' and `source_id` = '$source_id') as tmp on tmp.location_id = location.id";
	$result = mysqli_query($conn, $sql);
	echo "<table border = 1>";
	echo "<tr><td>temperature</td><td>datetime</td><td>source</td><td>location</td></tr>";
	if ($result->num_rows == 0) {
		echo "0 results";
	}
	while($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row["temperature"]."</td>";
		echo "<td>".$row["datetime"]."</td>";
		echo "<td>".$row["source_name"]."</td>";
		echo "<td>".$row["location_name"]."</td>";
	}
}

?>

</body>
</html>