<?php
include 'connection.php';

$source_id = NULL;
$location_id = NULL;
$temperature = NULL;
$datatime = NULL;

$uploadDir = dirname('__FILE__') . '/uploads/';
$processingDir = dirname('__FILE__') . '/processing/';
$proessedDir = dirname('__FILE__') . '/processed/';
$filenames = scandir($uploadDir);

if(count($filenames) > 0){
	// get first file
	$filename = $filenames[2]; // 0 is . and 1 is ..
	$uploadedFilename = $uploadDir . $filename;
	$processingFilename = $processingDir . $filename;
	$processedFilename = $proessedDir . $filename;

	rename($uploadedFilename, $processingFilename);

	// determine which data source it is
	$datasource = substr($filename, 0, strpos($filename, '.'));
	switch($datasource){
		case 'inside-wired':
			$source_id = 1;
			break;
		case 'inside-wireless':
			$source_id = 2;
			break;
		case 'outside-wired':
			$source_id = 3;
			break;
		case 'outside-wireless':
			$source_id = 4;
			break;
	}
}

$fileHandle = fopen($processingFilename, 'r');
while(($line = fgets($fileHandle)) !== false){
    $data = str_getcsv($line, ",",'"');
    if($data[2]=='Columbus, OH'){
        $location_id = 1;
        $temperature = $data[0];
        $datatime = $data[1];
        echo $temperature."\t";
        echo $datatime."\t";
        echo $location_id."\t";
        echo $source_id."\t";

        $sql = "INSERT INTO temperature (source_id,location_id,temperature,datetime) 
                 VALUES ('$source_id','$location_id','$temperature','$datatime')";
        if ($conn->query($sql) == TRUE) {
            echo "Import successfully\n";
        } 
    }
}
rename($processingFilename, $processedFilename);

#close connection
$conn->close();

?>