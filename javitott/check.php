<?php ob_start(); ?> 
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>

<?php

if(isset($_POST['login']))
{
	require_once("connection.php");
	$username=mysqli_real_escape_string($kapcsolat,$_POST["username"]);
	$password=mysqli_real_escape_string($kapcsolat,$_POST["password"]);
	$szszam = mysqli_real_escape_string($kapcsolat,$_POST["szszam"]);
	
	
	$query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
	$lekerdezes=mysqli_query($kapcsolat,$query);
	$row = mysqli_fetch_assoc($lekerdezes);
	
	if(password_verify($password, $row['password']))
	{
		session_start();
		$_SESSION["username"]=$username;
		$_SESSION["loggedin"]=true;
		header("Location:main1.php"); /*vagy  header("Location:main.php");  */
		exit;
	}
	else
	{
		header("Location:login.php?nomatch=true");
		exit;
	}
}
else
{
	header("Location:login.php");
	exit;
}

?>

</body>
</html>
