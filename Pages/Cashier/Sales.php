<?php
    
    include '../../CONNECTION/CONN.php';
    session_start();

    if (isset($_SESSION["emailout"])) 
    {
        
        $mailin=$_SESSION["emailout"];
        $passin=$_SESSION["unid"];

        $query = "select * from cashier where CA_Email='$mailin' and CA_Pass='$passin'";  
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
    <link rel="icon" type="image/icon" href="../../Images/images.png" />
    <link  rel="stylesheet" href="../CSS/Cashier.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
     
<body>

  <div class="w3-sidebar w3-bar-block w3-black large" style="width:180px">
    <a href="Cashier_dashboard.php" class="w3-bar-item w3-button"><i class="fa fa-dashboard"></i>&nbspDashboard</a><hr style="margin: 2px; border-top: 1px solid red; "> 
    <a href="Cashier_ID.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i>&nbspHome</a> <hr style="margin: 2px;"> 
    <a href="Sales.php" class="w3-bar-item w3-button"><i class="fa fa-money"></i>&nbspSales</a> <hr style="margin: 2px; border-top: 1px solid red;"> 
    <a class="w3-bar-item w3-button" onclick="myFunction()"><i class="fa fa-sign-out"></i>&nbspLogout</a> <hr style="margin: 2px;">
  </div>

  <div class="w3-container" style="margin-left:180px">
  <hr>
  <h2>Sales</h2>
  <hr>
  <p>Detailed Veiw of Sales.</p>
  <form id="formsup" action="Qurey/MS.php" method="post">
   	<table class="card">
        <div>
          <tr>
            <th>Image</th>
            <th>Product ID</th>
            <th colspan="2">Operations</th>
          </tr>
        </div>
        <div>
          <tr>
              <td><img src="../../img/product.jpg" alt="Products Pic" style="width:65px; height: 65px;"></td>
              <td><p><input id="qurey" type="text" name="Product_ID" placeholder="Product ID.."></p> </td>
              <td><p><button style="padding-left: 25px; padding-right: 25px;">SELL</button></p></td>
          </tr>
        </div>
    </table>
  </form>
<?php

    $query1 = "select * from Temporary_Sale";  
    $result1= sqlsrv_query( $conn, $query1 ) or die( print_r( sqlsrv_errors(), true));
?>
  <table class="card">
    <div>
      <tr>
        <th>Image</th>
        <th>Product ID</th>
        <th>Name</th>
        <th>Price</th>
        <th colspan="2">Operations</th>
      </tr>
    </div>
    <?php
        while($n_row1 = sqlsrv_fetch_array( $result1, SQLSRV_FETCH_ASSOC))
        { 
    ?>
    <div>
      <tr>
        <td><img src="../../img/product.jpg" alt="Products Pic" style="width:65px; height: 65px;"></td>
        <td><p><?php echo $n_row1['Product_ID']; ?></p> </td>
        <td><p><?php echo $n_row1['Name']; ?></p> </td>
        <td><p><?php echo $n_row1['Price']; ?></p> </td>
        <td><p><button style="padding-left: 25px; padding-right: 25px;">Delete</button></p></td>
      </tr>
    </div>
    <?php

        }

    ?>
  </table>

  <?php
      $sum=0;
      $query1 = "SELECT * FROM Temporary_Sale";  
      $result1= sqlsrv_query( $conn, $query1 ) or die( print_r( sqlsrv_errors(), true)); 
  ?>
<center>
  <form id="formsup" action="Qurey/MS2.php" method="post">
  <table class="cardd">
    <tr><td><p>TOTAL: <button style="padding-left: 25px; padding-right: 25px;">
      
    <?php

      while($n_row1 = sqlsrv_fetch_array( $result1, SQLSRV_FETCH_ASSOC))
      { 
        $sum = $sum + $n_row1['Price'];
      }
        echo $sum;
        $_SESSION["sumin"]=$sum;
    ?>

    </button></p></td></tr>
    <tr><td><p><button style="padding-left: 25px; padding-right: 25px;">NEXT TRANSACTION</button></p></td></tr>
  </table>
  </form>
</center>
    <hr>
    <h2>All Sales</h2>
    <hr>

   	  <?php
          $test_run1 = $num_row['CA_ID'];
          $query = "select * from sales where CA_ID ='$test_run1' ";  
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
            <th>Operations</th>
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
              <td><img src="../../img/sales.png" alt="Products Pic" style="width:65px; height: 65px;"></td>
              <td><p><?php echo $num_row['Sales_ID']; ?></p> </td>
              <td><p><?php echo $num_row['date_t']; ?></p> </td>
              <td><p><?php echo $num_row['Total']; ?></p> </td>
              <td><p><?php echo $n_row['CA_ID']; ?></p> </td>
              <td><p><?php echo $n_row['CA_F_Name'] . " " . $n_row['CA_L_Name']; ?></p> </td>
              <td><p><?php echo $n_row['CA_Email']; ?></p> </td>
              <td><p><?php echo $n_row['CA_Contact']; ?></p></td>
              <td><p><?php echo $n_row['CA_Address']; ?></p></td>
              <td><p><button style="padding-left: 25px; padding-right: 25px;">SOLD</button></p></td>
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
            header ('location:../../index.php?msg=Try-loging-in-before-proceding-further');
        }

    }
    else
    {
        sqlsrv_close( $conn );
        header ('location:../../index.php?msg=Try-loging-in-before-proceding-further');
    }
?>

<script>
    function myFunction() {
      var txt;
      var r = confirm("Press a button!");
      if (r == true) {
        location.replace("../Qurey/ML.php")
      } else {
        location.replace("Cashier_dashboard.php")
      }
    }
</script>

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin-bottom: 50px;
  font-family: arial;
}

.cardd {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  min-width: 1000px;
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

#qurey {
  width: 200px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  transition: width 0.4s ease-in-out;
}

</style>