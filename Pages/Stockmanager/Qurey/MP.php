<?php

	include ('../../../CONNECTION/CONN.php');

	session_start();
	$mailin=$_SESSION["emailout"];
    $passin=$_SESSION["unid"];
    $ppcode=$_REQUEST["Code"];
	$pname=$_REQUEST["Name"];
	$pup=$_REQUEST["Unit_Price"];
	$puis=$_REQUEST["Unit_in_Stock"];
	$pdis=$_REQUEST["Discount"];
	$p_reo_l=$_REQUEST["Reorder_Level"];
	$pcid=$_REQUEST["Catagory_ID"];
	$punitid=$_REQUEST["Unit_ID"];

    $query = "select * from stock_manager where SM_Email='$mailin' and SM_Pass='$passin'";  
    $result = sqlsrv_query( $conn, $query ) or die( print_r( sqlsrv_errors(), true));

    if ($num_row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
    {
    	$psmid=$num_row["SM_ID"];
    	$query = "INSERT INTO product (Supplier_Code, Name, Unit_price, Unit_in_Stock, Discount_Percentage, Re_Order_Level, Category_ID, Unit_ID, SM_ID) VALUES ('$ppcode', '$pname', '$pup', '$puis', '$pdis', '$p_reo_l', '$pcid', '$punitid', '$psmid');";
		$result = sqlsrv_query($conn, $query);
		if( $result === false ) 
		{
		     die( print_r( sqlsrv_errors(), true));
		}
		else
		{
			header('location:../Product.php?msg=success');
		}
    }
    else
	{
		header('location:../Product.php?msg=Failed!');
	}
	
?> 