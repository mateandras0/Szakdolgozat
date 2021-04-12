<?php  
session_start();
header("Content-type: text/html; charset=utf-8");  
?> 
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Blog</title>
<link href="blog.css" rel="stylesheet">
</head>
<body>

<h1>Vásárlói vélemények</h1>
<div id="cwrap"></div>

<form id="cadd">
  <h1>Ossza meg velünk véleményét!</h1>
  <input type="text" name ="cname" id="cname" placeholder="Név" required >
  <textarea id="cmsg" name="cmsg" placeholder="Vélemény" required rows="5"></textarea>
  <input type="submit" name="kuld">
</form>

<hr>

<?php
require_once('connection.php');
$query = "SELECT * FROM szdoga.blog";
$lekerdezes = mysqli_query($kapcsolat, $query);

 while ($row = mysqli_fetch_row($lekerdezes))
 {
?>
	<div class="crow">
	<div class="chead">
	<?php
	 echo $row[2] . "<br>";
	 echo $row[3]. "<br>";
	 ?>
	</div>
	<div class="cmsg">
	<?php
	 echo $row[4];
	 ?>
	 </div>
	 </div>

	 
<?php
 }

if(isset($_REQUEST['kuld']))
{
	require_once('connection.php');
	$name = $_REQUEST["cname"];
	$ms = $_REQUEST["cmsg"];
	
	$sql = "INSERT INTO szdoga.blog (name,message)
			VALUES('$name','$ms')";

		if (!mysqli_query($kapcsolat, $sql)) {
			print "<script> alert('Sikertelen blog komment!') </script>";
		} else {
			header("Location:blog.php");
			exit;
		}
}

?>

</body>
</html>
