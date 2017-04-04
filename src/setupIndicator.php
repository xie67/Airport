<?php
include 'connection.php';

//set up source indicator
$sql = "INSERT INTO source (source_name) VALUES ('inside concrete wired');";
$sql .= "INSERT INTO source (source_name) VALUES ('inside concrete wireless');";
$sql .= "INSERT INTO source (source_name) VALUES ('outside concrete wired');";
$sql .= "INSERT INTO source (source_name) VALUES ('outside concrete wireless');";

//set up location indicator
$sql .= "INSERT INTO location (location_name) VALUES ('Columbus, OH')";

//execute insert
if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
#close connection
$conn->close();

?>


