<?php  
header("Content-type: text/html; charset=utf-8");  
?> 
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="Máté András Miksa" content="Fiktív Szakdolgozat weboldal">
	<link rel="icon" href="favicon.png" type="image/x-icon">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<meta charset="utf-8">
<title>NotSafe Bank</title>
</head>
<body style="height: 100vh;">

	<div class="row">

		<header>
			<img class="yellow" src="logoszd.png" alt="logo" width="250px">
		</header>

	</div>


	<div class="row">

		
		<div class="row">
			
			<div class="col-3 col-t-2"></div>
			
			<div class="col-6 col-t-8 container2">
				
		
				<div id="sfullregist" style="color:rgb(148, 229, 172);text-align:center;-webkit-text-stroke-width: 1px;-webkit-text-stroke-color:black;">
					<?php
					if (isset($_GET["successful"])) {
						if ($_GET["successful"] == true) {
							print "Sikeres regisztráció! Kérem jelentkezzen be a folytatáshoz!";
						}
					}
					?>
				</div>

<form action="check.php" method="post" onSubmit="return emptybox()">
					<table>
						<tr>
							<h3>Internetbank Belépés</h3>
						</tr>
					<div id="errors" style="color:rgb(147, 26, 11);text-align:center">
					<?php
					if (isset($_GET["nomatch"])) {
						if ($_GET["nomatch"] == true) {
							print "Az Ön által megadott belépési adatok közül egy vagy több hibás. Kérem próbálja újra!";
						}
					}
					?>
					</div>
					<br>
						<tr>
							<td><label for="username">Azonosító</label></td>
							<td><input type="text" name="username" id="username" size=""></td>
						</tr>
						<tr>
							<td><label for="szszam">Számlaszám</label></td>
							<td><input type="text" pattern="\d*" maxlength="5" name="szszam" id="szszam" size=""></td>
						</tr>
						<tr>
							<td><label for="password">Jelszó</label></td>
							<td><input type="text" name="password" id="password" size=""></td>
						</tr>
						<tr>
							<td colspan="2">
								<input class="gomb" type="submit" name="login" value="Belépés">
							</td>
						</tr>
					</table>
</form>

<div class="signup">
					<form action="register.php" method="post">
						<input class="gomb secondary" type="submit" name="signup" value="Regisztráció">
					</form>
				</div>
			</div>

			<div class="col-3 col-t-2">
			<aside>
			<p>
			<img src="warning.png" alt="warning" width="100px"><br><br>
			<b>Figyelmeztetés adathalászatra!</b><br><br>
			Adathalász csalók rendszeresen megpróbálják megszerezni az óvatlan ügyfelek banki adatait. Az NotSafe Bank minden esetben megteszi az ilyenkor szokásos óvintézkedéseket, fejlett rendszereket alkalmaz a csalókkal szemben, a tudomására jutott gyanús esetekben pedig figyelmezteti ügyfeleit.</p>
			</aside>
			</div>
			
		</div>
		
			

	</div>


	
	<footer class="login">
		</p>NotSafe Bank WEBPAGE ©</p>
	</footer>

<script>
		function emptybox() {
			var errormsg = "Kérem töltse ki a mezőket!";

			if (document.getElementById("username").value == "" || document.getElementById("password").value == "" || document.getElementById("szszam").value == "") {
				document.getElementById("errors").innerHTML = errormsg;
				return false;
			} else {
				return true;
			}
		}
</script>

</body>
</html>
