<?php

require ('connection.php');

$uid =  $_GET['uid'];
$sql = "SELECT BalanceLeft FROM UsersBalance WHERE student_id ='$uid'";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
while($row = $result->fetch_assoc()){
    $bal = $row['BalanceLeft'];
    echo "Your refunded money is Rp $bal.";
}
$sql2 = "UPDATE UsersBalance SET BalanceLeft = 0 WHERE student_id = '$uid'";
$result2 = $conn->query($sql2);

}
else { 
    echo "error.";
}
mysqli_close($conn);
	
?>