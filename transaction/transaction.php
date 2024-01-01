<?php

require ('connection.php');

$uid =  $_GET['uid'];
$price = (int)$_GET['price'];
//$price= (int)$prices;
date_default_timezone_set("Asia/Jakarta");
//validate and update UsersBalance
$sql = "SELECT * FROM UsersBalance WHERE student_id ='$uid'";
$result = $conn->query($sql);
$success = "false";
while($row = $result->fetch_assoc()){
        $bal = $row['BalanceLeft'];
        $success = "true";
    	echo "validated ";
    	$validate = 1;
    	if ($bal>=$price) 
    	{
    		$sum=$bal-$price;
    		//echo "Current balance = ";
    		echo $sum;
    		//Update data in UsersBalance
    		$sql2 = "UPDATE UsersBalance SET BalanceLeft = '$sum' WHERE student_id = '$uid'";
            $result2 = $conn->query($sql2);
    		$success = "true";
    	}
    	else $success = "false";
}
if ($validate != 1){
    echo "UID not registered. ";
}
if ($success == "false"){
	    echo "Error";
    }
else{
        $date = date("Y-m-d H:i:s");
        $final = strtotime($date);
        $time_posted = date("Y-m-d H:i:s", $final);
        $sql3 = "SELECT student_id, SUM(BalanceLeft) FROM UsersBalance WHERE student_id = '$uid' ";
        $result3 = $conn->query($sql3);

        if ($result3->num_rows > 0) {
    // output data of each row
                while($row3 = $result3->fetch_assoc()) {
                    $BalanceLeft = $row3['SUM(BalanceLeft)']; 
                }
                $sql4 = "INSERT INTO daily_transaction (student_id, date_and_time, spent_amount, status, balance_left) VALUES ('$uid','$time_posted', '$price', 1, '$BalanceLeft')" ;

                if (mysqli_query($conn, $sql4)) {
                    
                } else {
                    echo "Error: " . $sql4 . "<br>" . mysqli_error($conn); 
                }
        } else {
            echo "0 results";
        }
}

mysqli_close($conn);
	
?>