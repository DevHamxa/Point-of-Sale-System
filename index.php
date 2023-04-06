
<?php
include 'CONNECTION/CONN.php';
	//Start session
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Point Of Sale</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link rel="icon" href="img/favicon.png">
  <link rel="stylesheet" href="css/style.css" type="text/css">

</head>

  <!--==========================
    main
  ============================-->
<main id="main">

<center>
<div>

	<form id="former" action="INSERTIN.php" method="post">
	                        
	     <table width="370" border="0px" id="table">
	        <tr height="65px" id="f001">
	          <td>&nbsp; <center><h1>LOG IN</h1></center> </td>
	        </tr>
	                
	                  
	                <tr height="45px" id="f002">
	          <td>&nbsp;Email</td>
	        </tr>

	        <tr height="45px" id="f002">
	          <td><input required="required" type="email" name="Emailin" placeholder="Enter Your Email" id="f002in"  /></td>
	        </tr>
	                
	                
	                <tr height="45px" id="f002">
	          <td>&nbsp;Password</td>
	        </tr>
	                
	                <tr height="45px" id="f002">
	          <td><input required="required" type="password" name="Passwordin" placeholder="Enter Your password" id="f002in"  /></td>
	        </tr>
	              
	                <tr height="45px" id="f002">
	          <center> <td><br>If You Don't have an acount? <a href="pages/signup/pin.php">Register</a>  ,Now. </td></center>
	        </tr>
	        
	                <tr height="100px" id="f003">
	          <td><center><button type="submit" id="f003in">LOG IN</button></center></td>
	        </tr>
		</table>

	</form>
</div>
</center>

</main>
</body>
</html>