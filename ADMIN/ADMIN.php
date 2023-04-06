<?php
    
    include '../CONNECTION/CONN.php';
    session_start();

    if (isset($_SESSION["emailout"])) 
    {
        
        $mailin=$_SESSION["emailout"];
        $passin=$_SESSION["unid"];

        $query = "select * from admin where AD_Email='$mailin' and AD_Pass='$passin'";  
        $result = sqlsrv_query( $conn, $query ) or die( print_r( sqlsrv_errors(), true));

        if ($num_row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
        {
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Point Of Sale</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="icon" type="image/icon" href="../Images/images.png" />
    <link  rel="stylesheet" href="CSS/admin.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
     
<body>

  <div class="w3-sidebar w3-bar-block w3-black large" style="width:180px">
    <a href="ADMIN.php" class="w3-bar-item w3-button"><i class="fa fa-dashboard"></i>&nbspDashboard</a><hr style="margin: 2px; border-top: 1px solid red; "> 
    <a href="Admin_ID.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i>&nbspHome</a> <hr style="margin: 2px;"> 
    <a href="Sales.php" class="w3-bar-item w3-button"><i class="fa fa-money"></i>&nbspSales</a> <hr style="margin: 2px; border-top: 1px solid red;"> 
    <a href="Products.php" class="w3-bar-item w3-button"><i class="fa fa-shopping-cart"></i>&nbspProducts</a><hr style="margin: 2px;"> 
    <a href="Employee.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i>&nbspEmployee</a> <hr style="margin: 2px; border-top: 1px solid red;"> 
    <a href="Supplier.php" class="w3-bar-item w3-button"><i class="fa fa-industry"></i>&nbspSupplier</a> <hr style="margin: 2px;"> 
    <a href="Order.php" class="w3-bar-item w3-button"><i class="fa fa-tag"></i>&nbspOrders</a> <hr style="margin: 2px; border-top: 1px solid red;"> 
    <a class="w3-bar-item w3-button" onclick="myFunction()"><i class="fa fa-sign-out"></i>&nbspLogout</a> <hr style="margin: 2px;"> 
  </div>

  <div class="w3-container" style="margin-left:180px">
  <hr>
  <h2>Dashboard</h2>
  <hr>
  <p>Platform for Admins to Manipulate Dataflow.</p>
  <?php
	    $test=0;
	    $sum=0;
	    $query1 = "select * from sales";  
	    $result1 = sqlsrv_query( $conn, $query1 ) or die( print_r( sqlsrv_errors(), true));
	    while($num_row1 = sqlsrv_fetch_array( $result1, SQLSRV_FETCH_ASSOC))
	    { 
	      $test = $test+1;
	      $sum = $sum + $num_row1['Total'];
	    }

	    $profit=0;
          $profitsum=0;
          $query4 = "select * from Receive_Product"; 
          $result4 = sqlsrv_query( $conn, $query4 ) or die( print_r( sqlsrv_errors(), true));
          while($num_row4 = sqlsrv_fetch_array( $result4, SQLSRV_FETCH_ASSOC))
          { 
            $profitsum = $profitsum + $num_row4['Total']; 
          }
          $profit=$sum-$profitsum;
    ?>
  <center>
    <table>
    	<tr>
	    <td><div class="card">
		  <img src="../img/expenditure.png" alt="Expenditure" style="width:100%">
		  <h1>Expenditure</h1>
		  <p class="price"><?php echo $profitsum; ?></p>
		  <p>Rs</p>
		  <p><button>Graph</button></p>
		</div></td>

		<td><div class="card">
		  <img src="../img/profit.png" alt="Profit" style="width:100%">
		  <h1>Profit</h1>
		  <p class="price"><?php echo $profit; ?></p>
		  <p>Rs</p>
		  <p><button>Graph</button></p>
		</div></td>
		</tr>
	</table>
	</center>
  </div>

</body>
</html>
<?php
    
        }

        else
        {
            sqlsrv_close( $conn );
            header ('location:../index.php?msg=Try-loging-in-before-proceding-further');
        }

    }
    else
    {
        sqlsrv_close( $conn );
        header ('location:../index.php?msg=Try-loging-in-before-proceding-further');
    }
?>

<script>
    function myFunction() {
      var txt;
      var r = confirm("Press a button!");
      if (r == true) {
        location.replace("Qurey/ML.php")
      } else {
        location.replace("ADMIN.php")
      }
    }
</script>

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}

.large{font-size:19px!important}

th,td {
  padding: 70px;
  text-align:center;
}
</style>