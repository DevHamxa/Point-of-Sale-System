<?php
$serverName = "DESKTOP-UF13BVG\SQLEXPRESS";
$connectionInfo = array( "Database"=>"pos", 'ReturnDatesAsStrings'=> true);
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
}
else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>