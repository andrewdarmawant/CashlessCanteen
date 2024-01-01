<?php

require ('connection.php');

$uid =   2900;
$price = (int)$_GET['price'];
$sql = "SELECT * FROM UsersBalance WHERE student_id = '$uid'";
$result = $conn->query($sql);
$success == "false";
while($row = $result->fetch_assoc()){
        $bal = $row['balance'];
        echo $bal;
        $success == "true";
    	echo "validated";
    	if ($bal>=$price) 
    	{
    		$sum=$bal-$price;
    		echo "<br>";
    		echo "Current balance = Rp ".$sum."";
    		$success == "true";
    	}
    	else $success == "false";
}
echo $success;
if ($success == "false"){
	    echo "<br>";
	    echo "error";
    } 
//success and fail not working
mysqli_close($conn);
	
?>