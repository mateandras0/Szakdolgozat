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

 <script>
function regEx() {
  var str = document.getElementById('cmsg').value;
  var patt = new RegExp("<|/|>");
  var res = patt.test(str);
  if(res == true)
  {
	  alert("A megadott szöveg nem tartalmazhat speciális karaktereket!");
	  return false;
  }
  else
  {
	  return true;
  }
	  
}
</script>

<h1>Vásárlói vélemények</h1>
<div id="cwrap"></div>

<form id="cadd">
  <h1>Ossza meg velünk véleményét!</h1>
  <input type="text" name ="cname" id="cname" placeholder="Név" required>
  <textarea id="cmsg" name="cmsg" placeholder="Vélemény" required rows="5" class="box"></textarea>
  <input type="submit" name="kuld" onclick="return regEx()">
</form>

<hr>

<?php
require_once('connection.php');
$query = "SELECT * FROM blog";
$lekerdezes = mysqli_query($kapcsolat, $query);

 while ($row = mysqli_fetch_assoc($lekerdezes))
 {
?>
	<div class="crow">
	<div class="chead">
	<?php
	 echo $row['timestamp'] . "<br>";
	 echo $row['name']. "<br>";
	 ?>
	</div>
	<div class="cmsg">
	<?php
	 echo $row['message'];
	 ?>
	 </div>
	 </div>

	 
<?php
 }

if(isset($_REQUEST['kuld']))
{
	require_once('connection.php');
	$name = mysqli_real_escape_string($kapcsolat,$_REQUEST["cname"]);
	$ms = mysqli_real_escape_string($kapcsolat,$_REQUEST["cmsg"]);
	
	$sql = "INSERT INTO blog (name,message)
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
