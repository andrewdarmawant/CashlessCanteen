<?php
   
    $dbusername = "userdemo";  
    $dbpassword = "localhost";  
    $server = "localhost"; 
  
    $dbconnect = mysqli_connect($server, $dbusername, $dbpassword);
    $dbselect = mysqli_select_db($dbconnect, "request");
  	
	$request= $_GET['request'];

    $sql = "INSERT INTO request.request (request) VALUES ('$request')";    
 
    mysqli_query($dbconnect, $sql);

?>