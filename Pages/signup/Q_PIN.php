<?php
	session_start();

	$sp=$_REQUEST["spost"];
	$_SESSION["spost"]=$sp;
	header('location:Sign_up.php?msg=sucess');
?> 