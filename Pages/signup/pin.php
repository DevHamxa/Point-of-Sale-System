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
    <form id="formsup" action="Q_PIN.php" method="post" style="margin: 100px;"> 
      <table id="tablesup" width="370" border="0px" id="table">
        
          <tr height="65px" id="f001"><td>&nbsp; <center><h1>POST</h1></center> </td></tr>
          <tr height="45px" id="f002"><td>&nbsp;<b>Select Post</b></td></tr>
          <tr height="45px" id="f002">
             <td><input type="radio" name="spost" value="1" required="required">
                  <label>Cashier</label><br>
                  <input type="radio" name="spost" value="0">
                  <label>Stock Manager</label>
              </td>
          </tr>
          <tr height="100px" id="f003"><td><center><button type="submit" id="f003in" >Enter</button></center></td></tr>
                
      </table>
    </form> 
</center>
   

</main>
</body>
</html>