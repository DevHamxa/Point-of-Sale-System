<?php

	include ('../../../CONNECTION/CONN.php');

	session_start();
	date_default_timezone_set("Asia/Karachi");
	$ppid=$_REQUEST["Product_ID"];
	$pcode=$_REQUEST["Sp_Code"];
	$pquantity=$_REQUEST["Quantity"];
	$ptime=date('Y-m-d H:i:s');
	$pstid=100;

	$mailin=$_SESSION["emailout"];
    $passin=$_SESSION["unid"];
	$query = "select * from stock_manager where SM_Email='$mailin' and SM_Pass='$passin'";  
    $result = sqlsrv_query( $conn, $query ) or die( print_r( sqlsrv_errors(), true));

    if ($num_row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
    {
    	$psmid=$num_row['SM_ID'];
    	$query = "INSERT INTO purchase_order(Product_ID, Supplier_Code, Quantity, Order_Date, SM_ID, ID) Values ('$ppid', '$pcode', '$pquantity', '$ptime', '$psmid', '$pstid')";
		$result = sqlsrv_query($conn, $query);
		if( $result === false ) 
		{
		     die( print_r( sqlsrv_errors(), true));
		}
		else
		{
			header('location:../Order.php?msg=success');
		}
		
    }
    else
    {
    	header('location:../Order.php?msg=No-Such-Order-Possible!!');
    }

	

	
?> 