<?php
header("Content-type: text/html; charset=utf-8");
?>
<HTML lang="hu">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="Mi" content="Fiktív Sportfogadás weboldal">
	<link rel="icon" href="favicon.png" type="image/x-icon">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<meta charset="utf-8">
	<title>Regisztráció</title>
</head>

<body>

	<?php

	if (isset($_POST['registration'])) {
		require_once("connection.php");
		if (isset($_POST["newpassword"])) {
			
			$pw = $_POST["newpassword"];
			$szszam = $_POST["newszszam"];
			$newusername = $_POST["newusername"];
		}

		$sql = "INSERT INTO szdoga.users (username,szszam,password)
			VALUES('$newusername','$szszam','$pw')";

		if (!mysqli_query($kapcsolat, $sql)) {
			$mes= "A megadott azonosító vagy számlaszám mar létezik. Kérem próbálja újra!";
		} else {
			header("Location:login.php?successful=true");
			exit;
		}
	}

	?>

	<div class="row">

		<header>
			<img class="yellow" src="logoszd.png" alt="logo" width="250px">
		</header>

	</div>


	<div class="row">

		


		<div class="col-3 col-t-2"></div>
		
		

		<div class="col-6 col-t-8 container2">
			<form action="<?php print $_SERVER['PHP_SELF'] ?>" method="post" onSubmit="return emptybox()">
				<table>
					<tr>
					<h3>Internetbank Regisztráció</h3>
					</tr>
					<div id="errors" style="color:rgb(147, 26, 11);text-align:center">
					<?php if(isset($mes)){print $mes;} ?>
					</div>
					<br>
					<tr>
						<td><label for="newusername">Azonosító</label></td>
						<td><input type="text" name="newusername" id="newusername" size="50"></td>
					</tr>
					<tr>
						<td><label for="newszszam">Számlaszám</label></td>
						<td><input type="text" pattern="\d*" maxlength="5" name="newszszam" id="newszszam" size="50"></td>
					</tr>
					<tr>
						<td><label for="newpassword">Jelszó</label></td>
						<td><input type="password" name="newpassword" id="newpassword" size="50"></td>
					</tr>
					<tr>
						<td><label for="newpasswordconf">Jelszó újra </label></td>
						<td><input type="password" name="newpasswordconf" id="newpasswordconf" size="50"></td>
					</tr>
					<tr>
						<td colspan="2">
							<input class="gomb" type="submit" name="registration" value="Regisztrálok">
						</td>
					</tr>
				</table>
			</form>

			<div class="signup" style="margin-top: -30px;">
				<form action="login.php" method="post">
					<input class="gomb secondary" type="submit" name="signup" value="belépés">
				</form>
			</div>
		</div>

		<div class="col-3 col-t-2">
		<aside>
			<p>
			<img src="info.jpg" alt="info" width="100px"><br><br>
			<b>Mire jó az internetbank?</b><br><br>
			Az internetbankban pénzügyeit kényelmesen, online intézheti, a nap 24 órájában, a hét minden napján.</p>
		</aside>
		</div>
	</div>
	
	<footer class="login">
		</p>NotSafe Bank WEBPAGE ©</p>
	</footer>

	<script>
		function emptybox() {
			var errormsg = "Kérem töltse ki a mezőket!";
			var errorpwordmsg = "A megadott jelszavak nem egyeznek! Kérem próbálja újra!";

			if (document.getElementById("newusername").value == "" ||
			document.getElementById("newpassword").value == "" || document.getElementById("newpasswordconf").value == "" || document.getElementById("newszszam").value == "") {
				document.getElementById("errors").innerHTML = errormsg;
				return false;
			} else {
				if (document.getElementById("newpassword").value != document.getElementById("newpasswordconf").value) {
					document.getElementById("errors").innerHTML = errorpwordmsg;
					return false;
				} else {
					return true;
				}

			}


		}
	</script>


</body>

</html>
