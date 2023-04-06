<?php
   
session_start();
function Dashboard($SESSIONemailout, $SESSIONunid) {
include '../../CONNECTION/CONN.php';

    if (isset($SESSIONemailout)) 
    {
        
        $mailin=$SESSIONemailout;
        $passin=$SESSIONunid;

        $query = "select * from cashier where CA_Email='$mailin' and CA_Pass='$passin'";  
        $result = sqlsrv_query( $conn, $query ) or die( print_r( sqlsrv_errors(), true));

        if ($num_row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
        {
        	echo "Success<br>";
	        $test=0;
	        $sum=0;
	        $test_run1 = $num_row['CA_ID'];
	        $query1 = "select * from sales where CA_ID ='$test_run1' ";  
	        $result1 = sqlsrv_query( $conn, $query1 ) or die( print_r( sqlsrv_errors(), true));
	        while($num_row1 = sqlsrv_fetch_array( $result1, SQLSRV_FETCH_ASSOC))
	        { 
	          $test = $test+1;
	          $sum = $sum + $num_row1['Total'];
	        }
	         echo $sum."<br>";
	          $profit=0;
	          $profitsum=0;
	          $query4 = "select * from Receive_Product"; 
	          $result4 = sqlsrv_query( $conn, $query4 ) or die( print_r( sqlsrv_errors(), true));
	          while($num_row4 = sqlsrv_fetch_array( $result4, SQLSRV_FETCH_ASSOC))
	          { 
	            $profitsum = $profitsum + $num_row4['Total']; 
	          }
	          $profit=$sum-$profitsum;
	          echo $profit."<br>";

        }

        else
        {
            sqlsrv_close( $conn );
            echo "no data match in database<br>";
            //header ('location:../../index.php?msg=Try-loging-in-before-proceding-further');
        }

    }
    else
    {
        sqlsrv_close( $conn );
        echo "Try-loging-in-before-proceding-further<br>";
        //header ('location:../../index.php?msg=Try-loging-in-before-proceding-further');
    }
}
//echo "Test1:<br>";
//Dashboard(null,null);
//echo "Test2:<br>";
//Dashboard("mhamza@gmail.com","123");
//echo "Test3:<br>";
//Dashboard("ca1@gmail.com","145");

//for branch coverage
//echo "Test1:<br>";
//Dashboard(null,null);
//Dashboard("h@gmail.com",null);
//echo "Test2:<br>";
//Dashboard("h@gmail.com",null);
Dashboard("ca1@gmail.com","145");
//echo "Test3:<br>";
//Dashboard("ca1@gmail.com","145");
//sqlsrv_query( $conn, "Any string");
//sqlsrv_query( $conn, $query );
?>
