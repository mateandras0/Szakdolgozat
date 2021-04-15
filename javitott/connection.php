<?php  
header("Content-type: text/html; charset=utf-8");  
?> 
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Első php programom</title>
</head>
<body>
<?php

$adatbazis = "szdoga";

$kapcsolat = mysqli_connect("127.0.0.1", "root", "");
$kapcsolat->set_charset("utf-8");

if ( ! $kapcsolat )
{
	die( "Nem lehet csatlakozni a MySQL kiszolgálóhoz! " . mysqli_error() );
}
else
{
	print "";
}

mysqli_select_db($kapcsolat, $adatbazis )
or die ( "Nem lehet megnyitni a következő adatbázist: $adatbazis".mysqli_error());

?>
</body>
</html>
