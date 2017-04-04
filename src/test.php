<?php
include 'connection.php';

$startDate = '2017-02-04';
$endDate = '2017-02-05';
$source_id = 3;

$sql = "select `temperature`,`datetime`,`source_name`,`location_name` from location join 
	(select `temperature`,`datetime`,`source_name`,`location_id` from temperature join source 
	on temperature.source_id = source.id 
	where `datetime` >= '$startDate' and `datetime` < '$endDate' and `source_id` = '$source_id') as tmp on tmp.location_id = location.id";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
		echo $row["temperature"]."\t";
		echo $row["datetime"]."\t";
		echo $row["source_name"]."\t";
		echo $row["location_name"]."\n";
	}
#close connection
$conn->close();
?>


