<?php
    
    include '../../CONNECTION/CONN.php';
    session_start();

    if (isset($_SESSION["emailout"])) 
    {
        
        $mailin=$_SESSION["emailout"];
        $passin=$_SESSION["unid"];

        $query = "select * from stock_manager where SM_Email='$mailin' and SM_Pass='$passin'";  
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
    <link  rel="stylesheet" href="../CSS/Stock.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
     
<body>

  <div class="w3-sidebar w3-bar-block w3-black large" style="width:180px">
    <a href="Sm_dashboard.php" class="w3-bar-item w3-button"><i class="fa fa-dashboard"></i>&nbspDashboard</a><hr style="margin: 2px; border-top: 1px solid red; "> 
    <a href="sm_ID.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i>&nbspHome</a> <hr style="margin: 2px;"> 
    <a href="Order.php" class="w3-bar-item w3-button"><i class="fa fa-tag"></i>&nbspOrders</a> <hr style="margin: 2px; border-top: 1px solid red;"> 
    <a href="Products.php" class="w3-bar-item w3-button"><i class="fa fa-shopping-cart"></i>&nbspProducts</a><hr style="margin: 2px;"> 
    <a href="Supplier.php" class="w3-bar-item w3-button"><i class="fa fa-industry"></i>&nbspSupplier</a> <hr style="margin: 2px; border-top: 1px solid red;"> 
    <a class="w3-bar-item w3-button" onclick="myFunction()"><i class="fa fa-sign-out"></i>&nbspLogout</a> <hr style="margin: 2px;">  
  </div>

  <div class="w3-container" style="margin-left:180px">
  <hr>
  <h2>Orders</h2>
  <hr>
  <p>Detailed Veiw of Orders.</p> 
  <form id="formsup" action="Qurey/MS.php" method="post">
    <table class="card">
        <div>
          <tr>
            <th>Image</th>
            <th>Product ID</th>
            <th>Code</th>
            <th>Quantity</th>
            <th colspan="2">Operations</th>
          </tr>
        </div>
        <div>
          <tr>
              <td><img src="../../img/product.jpg" alt="Products Pic" style="width:65px; height: 65px;"></td>
              <td><p><input id="qurey" required="required" type="text" name="Product_ID" placeholder="Product ID.."></p> </td>
              <td><p><input id="qurey" required="required" type="text" name="Sp_Code" placeholder="Code.."></p> </td>
              <td><p><input id="qurey" required="required" type="text" name="Quantity" placeholder="Quantity.."></p> </td>
              <td><p><button style="padding-left: 25px; padding-right: 25px;">Order</button></p></td>
          </tr>
        </div>
    </table>
  </form>
      <?php
          $query = "select * from product where Unit_in_Stock <= Re_Order_Level and Product_ID NOT in (select Product_ID from purchase_order)"; 
          $result = sqlsrv_query( $conn, $query ) or die( print_r( sqlsrv_errors(), true));
      ?>

      <table class="card" action="Qurey/MS.php.php" method="post">
        <div>
          <tr>
            <th>Image</th>
            <th>Product ID</th>
            <th>Code</th>
            <th>Unit</th>
            <th>Unit in Stock</th>
          </tr>
        </div>

      <?php
          while($num_row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
          { 
              $test = $num_row['Unit_ID'];
              $query2 = "select * from product_unit where Unit_ID = '$test' "; 
              $result2 = sqlsrv_query( $conn, $query2 ) or die( print_r( sqlsrv_errors(), true));

              if ($n_row = sqlsrv_fetch_array( $result2, SQLSRV_FETCH_ASSOC))
              {

      ?>
        <div>
          <tr>
              <td><img src="../../img/sales.png" alt="Products Pic" style="width:65px; height: 65px;"></td>
              <td><p><?php echo $num_row['Product_ID']; ?></p> </td>
              <td><p><?php echo $num_row['Supplier_Code']; ?></p> </td>
              <td><p><?php echo $n_row['Name']; ?></p> </td>
              <td><p><?php echo $num_row['Unit_in_Stock']; ?></p> </td>
          </tr>
        </div>
      <?php
              }
            
          }
      ?> 
  </table>
  <hr>
  <h2>Purchase Recipte</h2>
  <hr> 
      <?php
          $query = "select * from purchase_order where ID = 100 ";  
          $result = sqlsrv_query( $conn, $query ) or die( print_r( sqlsrv_errors(), true));
      ?>

      <table class="card">
        <div>
          <tr>
            <th>Image</th>
            <th>Order ID</th>
            <th>Product ID</th>
            <th>Code</th>
            <th>Quantity</th>
            <th>Order Date</th>
            <th>Stock Manager ID</th>
          </tr>
        </div>

      <?php
          while($num_row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
          { 

      ?>
        <div>
          <tr>
              <td><img src="../../img/sales.png" alt="Products Pic" style="width:65px; height: 65px;"></td>
              <td><p><?php echo $num_row['Purchase_Order_ID']; ?></p> </td>
              <td><p><?php echo $num_row['Product_ID']; ?></p> </td>
              <td><p><?php echo $num_row['Supplier_Code']; ?></p> </td>
              <td><p><?php echo $num_row['Quantity']; ?></p> </td>
              <td><p><?php echo $num_row['Order_Date']; ?></p> </td>
              <td><p><?php echo $num_row['SM_ID']; ?></p> </td>
          </tr>
        </div>
      <?php
              
          }

      ?> 
</table>
  <hr>
  <h2>Recived Orders</h2>
  <hr> 
      <?php
          $query = "select * from Receive_Product"; 
          $result = sqlsrv_query( $conn, $query ) or die( print_r( sqlsrv_errors(), true));
      ?>

      <table class="card">
        <div>
          <tr>
            <th>Image</th>
            <th>Recive ID</th>
            <th>Product ID</th>
            <th>Code</th>
            <th>Quantity</th>
            <th>Order Date</th>
            <th>Unit Price</th>
            <th>Total</th>
          </tr>
        </div>

      <?php
          while($num_row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC))
          { 

      ?>
        <div>
          <tr>
              <td><img src="../../img/sales.png" alt="Products Pic" style="width:65px; height: 65px;"></td>
              <td><p><?php echo $num_row['Receive_Product_ID']; ?></p> </td>
              <td><p><?php echo $num_row['Product_ID']; ?></p> </td>
              <td><p><?php echo $num_row['Supplier_Code']; ?></p> </td>
              <td><p><?php echo $num_row['Quantity']; ?></p> </td>
              <td><p><?php echo $num_row['Received_Date']; ?></p> </td>
              <td><p><?php echo $num_row['Unit_Price']; ?></p> </td>
              <td><p><?php echo $num_row['Total']; ?></p> </td>
          </tr>
        </div>
      <?php
              
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
        location.replace("Sm_dashboard.php")
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