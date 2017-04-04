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
  	Year-Month-Day-Hour (2017-02-01-13:00:00):
	<input type="text" name="year"> 
  	<input type="text" name="month"> 
  	<input type="text" name="day"> 
  	<input type="text" name="hour"> 
	  
    <input type="submit" value="Submit">
</form>

</body>
</html>

<?php
$position = $_POST['position'];
$transfer = $_POST['transfer'];
$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['day'];
$hour = $_POST['hour'];

if($position == "Inside concrete"){
	if($transfer == "Wired") $source_id = 1;
	else $source_id = 2;
}else{
	if($transfer == "Wired") $source_id = 3;
	else $source_id = 4;
}
$time = $year."-".$month."-".$day." ".$hour;
$datetime = date('Y-M-D h:i:s',$time);

echo $source_id;
echo $datetime;
?>