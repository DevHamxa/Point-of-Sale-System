<?php

	include ('../../../CONNECTION/CONN.php');

	session_start();
	$ppid=$_REQUEST["Product_ID"];

	$query = "select * from product where Product_ID ='$ppid' ";  
    $result = sqlsrv_query( $conn, $query ) or die( print_r( sqlsrv_errors(), true));

    if ($num_row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
    {
		$pid=$num_row['Product_ID'];
		$pname=$num_row['Name'];
		$pprice=$num_row['Unit_price'];
		$query = "INSERT INTO Temporary_Sale (Product_ID, Name, Price) VALUES ('$pid', '$pname', '$pprice')";
		$result = sqlsrv_query($conn, $query);
		
		if( $result === false ) 
		{
		     die( print_r( sqlsrv_errors(), true));
		}
		header('location:../Sales.php?msg=success');
    }
    else
    {
    	header('location:../Sales.php?msg=No-Such-Product-Exists!!');
    }

	

	
?> 