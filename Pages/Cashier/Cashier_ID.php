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
        <h2><b>Hi!&nbsp</b><?php echo $num_row['CA_F_Name']; ?></h2>
        <hr>
        <p>Platform for Cashiers to Change there ID Information.</p>
        <div class="card">
        <img src="../../img/img_avatar.png" alt="Cashier Pic" style="width:100%">
        <h1><?php echo $num_row['CA_F_Name'] . " " . $num_row['CA_L_Name']; ?></h1>
        <p class="title"><?php echo $num_row['CA_Email']; ?></p>
        <p><?php echo $num_row['CA_Contact']; ?></p>
        <div style="margin: 24px 0;">
          <a href="https://mail.google.com/mail/u/0/#inbox"><i class="fa fa-envelope"></i></a> 
          <a href="https://twitter.com/?lang=en"><i class="fa fa-twitter"></i></a>  
          <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>  
          <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a> 
        </div>
        <p><button>Edit Profile</button></p> 
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
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
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

.large{font-size:19px!important}

button:hover, a:hover {
  opacity: 0.7;
}
</style>