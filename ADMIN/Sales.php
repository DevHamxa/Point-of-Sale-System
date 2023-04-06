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
  <h2>Sales</h2>
  <hr>
  <p>Detailed Veiw of Sales.</p>
   	  
   	  <?php
          $query = "select * from sales";  
          $result = sqlsrv_query( $conn, $query ) or die( print_r( sqlsrv_errors(), true));
      ?>

      <table class="card">
        <div>
          <tr>
            <th>Image</th>
            <th>Sale ID</th>
            <th>Date</th>
            <th>Total Price</th>
            <th>Cashier ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Applied Operation</th>
          </tr>
        </div>

      <?php
          while($num_row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
          {   
              $test = $num_row['CA_ID'];
              $query2 = "select * from cashier where CA_ID = '$test' "; 
              $result2 = sqlsrv_query( $conn, $query2 ) or die( print_r( sqlsrv_errors(), true));

              if ($n_row = sqlsrv_fetch_array( $result2, SQLSRV_FETCH_ASSOC))
              { 

      ?>
        <div>
          <tr>
              <td><img src="../img/sales.png" alt="Products Pic" style="width:65px; height: 65px;"></td>
              <td><p><?php echo $num_row['Sales_ID']; ?></p> </td>
              <td><p><?php echo $num_row['date_t']; ?></p> </td>
              <td><p><?php echo $num_row['Total']; ?></p> </td>
              <td><p><?php echo $n_row['CA_ID']; ?></p> </td>
              <td><p><?php echo $n_row['CA_F_Name'] . " " . $n_row['CA_L_Name']; ?></p> </td>
              <td><p><?php echo $n_row['CA_Email']; ?></p> </td>
              <td><p><?php echo $n_row['CA_Contact']; ?></p></td>
              <td><p><?php echo $n_row['CA_Address']; ?></p></td>
              <td><p><button>SOLD</button></p></td>
          </tr>
        </div>
      <?php
              }
            
          }
      ?> 

</table> 
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
  margin-bottom: 50px;
  font-family: arial;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}

.large{font-size:19px!important}

th,td {
  padding: 15px;
  text-align:center;
}

</style>