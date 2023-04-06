<?php
	include ('../../CONNECTION/CONN.php');

	session_start();
	$ppid=$_REQUEST["Employee_ID"];

    $query = "DELETE from cashier where CA_ID = '$ppid' ";
	$result = sqlsrv_query($conn, $query);
	
	if( $result === false ) 
	{
		$query = "DELETE from stock_manager where SM_ID = '11' ";
		$result = sqlsrv_query($conn, $query);
		if( $result === false ) 
		{
	     	die( print_r( sqlsrv_errors(), true));
	 	}
	 	else
	 	{
	 		header('location:../Sales.php?msg=success');
	 	}
	 	
	}
	else
	{
		header('location:../Sales.php?msg=Failed!');
	}
	
?>