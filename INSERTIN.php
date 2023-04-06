<?php

	include ('CONNECTION/CONN.php');
	 $mailin=$_REQUEST["Emailin"];
	 $passin=$_REQUEST["Passwordin"];
	 session_start();
	  
	$query = "select * from admin where AD_Email='$mailin' and AD_Pass='$passin'";	
	$result = sqlsrv_query( $conn, $query ) or die( print_r( sqlsrv_errors(), true));

	if ($num_row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
	{
		$passlogin=$num_row['AD_Pass'];
		$emaillogin=$num_row['AD_Email'];
		$Firstnamelogin=$num_row['	AD_F_Name'];
		
		
		$_SESSION["emailout"] = $emaillogin;
	    $_SESSION["unid"] = $passlogin;	
		$_SESSION["fn"]=$Firstnamelogin;      

		header ('location:ADMIN/ADMIN.php?msg=success');
	}
	else
	{
		$query = "select * from cashier where CA_Email='$mailin' and CA_Pass='$passin'";	
		$result = sqlsrv_query( $conn, $query ) or die( print_r( sqlsrv_errors(), true));

		if ($num_row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
		{
			$passlogin=$num_row['CA_Pass'];
			$emaillogin=$num_row['CA_Email'];
			$Firstnamelogin=$num_row['CA_F_Name'];
			
			
			$_SESSION["emailout"] = $emaillogin;
		    $_SESSION["unid"] = $passlogin;	
			$_SESSION["fn"]=$Firstnamelogin;   

			header ('location:Pages/Cashier/Cashier_dashboard.php?msg=success');

		}
		else
		{
			$query = "select * from stock_manager where SM_Email='$mailin' and SM_Pass='$passin'";	
			$result = sqlsrv_query( $conn, $query ) or die( print_r( sqlsrv_errors(), true));

			if ($num_row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
			{
				$passlogin=$num_row['SM_Pass'];
				$emaillogin=$num_row['SM_Email'];
				$Firstnamelogin=$num_row['SM_F_Name'];
				
				
				$_SESSION["emailout"] = $emaillogin;
			    $_SESSION["unid"] = $passlogin;	
				$_SESSION["fn"]=$Firstnamelogin;      

				header ('location:Pages/Stockmanager/Sm_dashboard.php?msg=success');
			}
			else
			{
				header ('location:index.php?msg=Errors');
			}

		}
		
	}


	sqlsrv_close( $conn );

	/*database data the end*/

?>