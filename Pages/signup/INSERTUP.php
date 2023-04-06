<?php

	include ('../../CONNECTION/CONN.php');
	session_start();

	$fname=$_REQUEST["FName"];
	$lname=$_REQUEST["LName"];
	$mail=$_REQUEST["Email"];
	$pass=$_REQUEST["Password"];
	$cpass=$_REQUEST["ConfirmPassword"];
	$adress=$_REQUEST["Address"];
	$contact=$_REQUEST["Contact"];
	$check=$_SESSION["spost"];
	if($pass==$cpass)
	{
		if($check==1)
		{
			$query = "INSERT INTO cashier (CA_F_Name, CA_L_Name, CA_Email, CA_Pass, CA_Address, CA_Contact) VALUES ('$fname','$lname','$mail','$pass','$adress','$contact')";
			$result = sqlsrv_query($conn, $query);
			if( $result === false ) 
			{
			     die( print_r( sqlsrv_errors(), true));
			}
		}
		else
		{
			$query = "INSERT INTO stock_manager (SM_F_Name, SM_L_Name, SM_Email, SM_Pass, SM_Address, SM_Contact) VALUES ('$fname','$lname','$mail','$pass','$adress','$contact')";
			$result = sqlsrv_query($conn, $query);
			if( $result === false ) 
			{
			     die( print_r( sqlsrv_errors(), true));
			}

		}
		header('location:../../index.php?msg=success');

	}
	else
	{
		header('location:Sign_up.php?msg=PLEASE CHECK YOUR PASSWORD!!!!!!!');
	}
	
?> 