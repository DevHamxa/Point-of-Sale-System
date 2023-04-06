<?php

	include ('../../../CONNECTION/CONN.php');

	session_start();
	date_default_timezone_set("Asia/Karachi");
	$sumin = $_SESSION["sumin"];
	$time=date('Y-m-d H:i:s');
	$mailin=$_SESSION["emailout"];
    $passin=$_SESSION["unid"];

    $query5 = "select * from cashier where CA_Email='$mailin' and CA_Pass='$passin'";  
    $result5 = sqlsrv_query( $conn, $query5 ) or die( print_r( sqlsrv_errors(), true));

    if ($num_rw5 = sqlsrv_fetch_array( $result5, SQLSRV_FETCH_ASSOC))
    {
    	$cash=$num_rw5['CA_ID'];
		$query2 = "INSERT INTO sales (CA_ID, date_t, Total) VALUES ('$cash','$time','$sumin')";  
	    $result2= sqlsrv_query( $conn, $query2 ) or die( print_r( sqlsrv_errors(), true));
	    if( $result2 === false ) 
		{
		     die( print_r( sqlsrv_errors(), true));
		}


		$query1 = "select * from product where Product_ID in (select Product_ID from Temporary_Sale)";  
	    $result1= sqlsrv_query( $conn, $query1 ) or die( print_r( sqlsrv_errors(), true)); 
	    while($n_row1 = sqlsrv_fetch_array( $result1, SQLSRV_FETCH_ASSOC))
	    {
	    	$ppid=$n_row1['Product_ID'];
	    	$unitst=$n_row1['Unit_in_Stock']-1;
	    	$query3 = "UPDATE product SET Unit_in_Stock='$unitst' where Product_ID = '$ppid'";  
	    	$result3= sqlsrv_query( $conn, $query3 ) or die( print_r( sqlsrv_errors(), true)); 
	    	if( $result2 === false ) 
			{
			     die( print_r( sqlsrv_errors(), true));
			}
	    }

		$query = "TRUNCATE TABLE Temporary_Sale";  
	    $result = sqlsrv_query( $conn, $query ) or die( print_r( sqlsrv_errors(), true));

	    if ($num_row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
	    {
			header('location:../Sales.php?msg=Transaction-Failed!');
	    }
	    else
	    {
	    	header('location:../Sales.php?msg=success');	
	    }
	
	}
	else
	{
		header('location:../Sales.php?msg=Session-ID-Unknown!');
    }
	
?> 