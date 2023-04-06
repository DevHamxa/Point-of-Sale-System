<?php
    session_start();

    if (isset($_SESSION["spost"])) 
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Attendo</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../../img/favicon.png" rel="icon">
  <link href="../CSS/Sign_up.css" rel="stylesheet">
</head>

<body>

  
  <!--==========================
    main
  ============================-->
 <main id="main">

<center>

    <form id="formsup" action="INSERTUP.php" method="post">
                                
        <table width="370" border="0px" id="tablesup">
            <tr height="65px" id="f001">
              <td>&nbsp; <center><h1>REGISTER</h1></center> </td>
            </tr>
                    
                    <tr height="45px" id="f002">
              <td>&nbsp;First Name</td>
            </tr>

            <tr height="45px" id="f002">
              <td><input required="required" type="text" name="FName" placeholder="Enter Your First Name" id="f002in"  /></td>
            </tr>
                

                 <tr height="45px" id="f002">
              <td>&nbsp;Last Name</td>
            </tr>

            <tr height="45px" id="f002">
              <td><input required="required" type="text" name="LName" placeholder="Enter Your Last Name" id="f002in"  /></td>
            </tr>    

                    <tr height="45px" id="f002">
              <td>&nbsp;Email</td>
            </tr>

            <tr height="45px" id="f002">
              <td><input required="required" type="email" name="Email" placeholder="Enter Your Email" id="f002in"  /></td>
            </tr>
                    
                    
                    <tr height="45px" id="f002">
              <td>&nbsp;Password</td>
            </tr>
                    
                    <tr height="45px" id="f002">
              <td><input required="required" type="password" name="Password" placeholder="Enter Your password" id="f002in"  /></td>
            </tr>
                    
                    <tr height="45px" id="f002">
              <td>&nbsp;Confirm Password</td>
            </tr>

            <tr height="45px" id="f002">
            <td><input required="required" type="password" name="ConfirmPassword" placeholder="Confirm Password" id="f002in"  /></td>
            </tr>
               
            
            <tr height="45px" id="f002">
              <td>&nbsp;Address</td>
            </tr>

            <tr height="45px" id="f002">
              <td><input required="required" type="text" name="Address" placeholder="Enter Your Address" id="f002in"  /></td>
            </tr>

            <tr height="45px" id="f002">
              <td>&nbsp;Contact</td>
            </tr>

            <tr height="45px" id="f002">
              <td><input required="required" type="text" name="Contact" placeholder="Enter Your Contact" id="f002in"  /></td>
            </tr>

                    <tr height="100px" id="f003">
              <td><center><button type="submit" id="f003in">Sign up</button></center></td>
            </tr>
        </table>

    </form>
</center>


</main> 
</body>
</html>
<?php
    }
    else
    {
        header ('location:pin.php?msg=Enter-Post');
    }
?>