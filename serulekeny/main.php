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
		<meta name="Mi" content="Fiktív webshop weboldal">
		<link rel="icon" href="favicon.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="style.css">
		<meta charset="utf-8">
		<title>Main Page</title>
	</head>
	<body style="background-image:url('wsback.jpg')">

		<div class="row" style="text-align:left">

			<header class="betting-header">
				<img class="yellow" src="shop.png" alt="logo" width="250px">
				<a class='gomb secondary logout' href='logout.php'>Kijelentkezés</a>
			</header>

		

		<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
			<input type="text" name="keres" style="width:180px;  margin-left:20px;">
			<input type="submit" value="keresés" class="search">
		</form>
		</div>

				<div class="row">
			<?php
				if(isset($_REQUEST['keres']))
				{
					$kereses = $_POST['keres'];
				
				require_once("connection.php");
				// echo "<h1>Welcome back " . $_SESSION["username"] . "!</h1>";
				$query = "SELECT pname, pquantity, pprice FROM szdoga.products WHERE pname LIKE '%$kereses%'";
				$lekerdezes = mysqli_query($kapcsolat, $query);
			?>
			<div class="col-2 col-t-1"></div>

			<div class="col-8 col-t-10 container2">
				<div id="errors"></div>

				<h3 class="center">Talált termékek</h3>
				
					<table class="betting dark" style="margin-top:50px;">
						<tr class="elso-sor">
							<td>Termék megnevezése</td>
							<td>Elérhető mennyiség</td>
							<td>Ár - HUF</td>
						</tr>	
						<?php
							while ($row = mysqli_fetch_row($lekerdezes)) {
									?>
									<tr>
										<td> <?php echo $row[0] ?></td>
										<td> <?php echo $row[1] ?></td>
										<td> <?php echo $row[2] ?></td>
									</tr>
									<?php 			
									}
									?>
					</table>
								
				</form>
			</div>
			<div class="col-2 col-t-1"></div>
		</div>
				<?php }} ?>

				
		<footer class="login unfixed">
			</p>Webshop WEBPAGE ©</p>
		</footer>


<script>
 
</script>


	</body>

	</html>