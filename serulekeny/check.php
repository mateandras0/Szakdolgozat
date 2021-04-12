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
	$username=$_POST["username"];
	$password=$_POST["password"];
	$szszam = $_POST["szszam"];
	
	$query = "SELECT * FROM szdoga.users WHERE username='$username' AND password='$password'";
	$lekerdezes=mysqli_query($kapcsolat,$query);
	
	if(mysqli_num_rows($lekerdezes) == 1 || $lekerdezes==true)
	{
		session_start();
		$_SESSION["username"]=$username;
		$_SESSION["loggedin"]=true;
		header("Location:main1.php");
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
