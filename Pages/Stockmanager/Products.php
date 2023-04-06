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
  <h2>Product</h2>
  <hr>
  <p>The page gives detailed explanation of products</p>
  <form id="formsup" action="Qurey/MP.php" method="post">
    <table class="card">
        <div>
          <tr>
            <th>Image</th>
            <th>Code</th>
            <th>Name</th>
            <th>Unit Price</th>
            <th>Unit in Stock</th>
            <th>Discount</th>
            <th>Reorder Level</th>
            <th>Catagory ID</th>
            <th>Unit ID</th>
            <th>Operations</th>
          </tr>
        </div>
        <div>
          <tr>
              <td><img src="../../img/product.jpg" alt="Products Pic" style="width:65px; height: 65px;"></td>
              <td><p><input id="qurey" required="required" type="text" name="Code" placeholder="Code.."></p> </td>
              <td><p><input id="qurey" required="required" type="text" name="Name" placeholder="Code.."></p> </td>
              <td><p><input id="qurey" required="required" type="text" name="Unit_Price" placeholder="Unit Price.."></p> </td>
              <td><p><input id="qurey" required="required" type="text" name="Unit_in_Stock" placeholder="Unit in Stock.."></p> </td>
              <td><p><input id="qurey" required="required" type="text" name="Discount" placeholder="Discount.."></p> </td>
              <td><p><input id="qurey" required="required" type="text" name="Reorder_Level" placeholder="Reorder Level.."></p> </td>
              <td><p><input id="qurey" required="required" type="text" name="Catagory_ID" placeholder="Catagory ID.."></p> </td>
              <td><p><input id="qurey" required="required" type="text" name="Unit_ID" placeholder="Unit ID.."></p> </td>
              <td><p><button>INSERT</button></p></td>
          </tr>
        </div>
    </table>
  </form>

      <?php
          $query = "select * from product";  
          $result = sqlsrv_query( $conn, $query ) or die( print_r( sqlsrv_errors(), true));
      ?>
      <table class="card">
        <div>
          <tr>
            <th>Image</th>
            <th>Product ID</th>
            <th>Code</th>
            <th>Name</th>
            <th>Unit price</th>
            <th>Unit</th>
            <th>Unit in Stock</th>
            <th>Discount %</th>
            <th>Reorder level</th>
            <th>Stock Manager ID</th>
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
              <td><img src="../../img/product.jpg" alt="Products Pic" style="width:65px; height: 65px;"></td>
              <td><p><?php echo $num_row['Product_ID']; ?></p> </td>
              <td><p><?php echo $num_row['Supplier_Code']; ?></p> </td>
              <td><p><?php echo $num_row['Name']; ?></p> </td>
              <td><p><?php echo $num_row['Unit_price']; ?></p> </td>
              <td><p><?php echo $n_row['Name']; ?></p> </td>
              <td><p><?php echo $num_row['Unit_in_Stock']; ?></p> </td>
              <td><p><?php echo $num_row['Discount_Percentage']; ?></p></td>
              <td><p><?php echo $num_row['Re_Order_Level']; ?></p></td>
              <td><p><?php echo $num_row['SM_ID']; ?></p></td>
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
  width: 80px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 14px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  transition: width 0.4s ease-in-out;
}

</style>
