
<?php

session_start();

if($_SESSION['loggedin'])
{      
	setcookie("refreshcheck","refreshed",time()-100,"/");
    session_destroy();         
    header("Location: login.php");
} 
