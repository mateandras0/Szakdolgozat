<?php
setcookie("refreshcheck", "refreshed", time() - 100, "/");
session_start();

if (!isset($_SESSION["loggedin"])) {
	header("Location:login.php");
	exit;
} else {
?>
	<!DOCTYPE HTML>
	<HTML lang="hu">

	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="Mi" content="Fiktív NotSafe Bank weboldal">
		<link rel="icon" href="favicon.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="style.css">
		<meta charset="utf-8">
		<title>Main Page</title>
	</head>
	<body>

		<div class="row" style="text-align:left">

			<header class="betting-header">
				<img class="yellow" src="logoszd.png" alt="logo" width="250px">
				<a class='gomb secondary logout' href='logout.php'>Kijelentkezés</a>
			</header>

			<div class="row">
			<?php
			echo "<h1 style='color:white;text-align:center;margin-bottom:400px;'>Sikeres bejelentkezés! <br> Üdv " . $_SESSION["username"] . "!</h1>";
			?>
			</div>
			
<?php } ?>
				
		<footer class="login unfixed">
			</p>NotSafe Bank WEBPAGE ©</p>
		</footer>


<script>
 
</script>


	</body>

	</html>