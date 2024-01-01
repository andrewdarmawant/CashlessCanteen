<?php
date_default_timezone_set("Asia/Jakarta");
$date = date("Y-m-d H:i:s");
$final = strtotime($date);
$time_posted = date("Y-m-d H:i:s", $final);
// $UID= $_GET['UID']; (kalo pake arduino)
// $spent_amount= $_GET['spent_amount']; (kalo pake arduino)
$spent_amount = 69000;
require ('connection.php');
$sql = "SELECT student_id, SUM(BalanceLeft) FROM UsersBalance WHERE student_id = 5000 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
   while($row = $result->fetch_assoc()) {
          $BalanceLeft = $row['SUM(BalanceLeft)']; 
    }

} else {
    echo "0 results";
}
$BalanceLeft = $BalanceLeft - $spent_amount;

$sql = "INSERT INTO daily_transaction (student_id, date_and_time, spent_amount, status, balance_left) VALUES (2900,'$time_posted', '$spent_amount', 1, '$BalanceLeft')" ;

// $result2 = mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
}
mysqli_close($conn);
?>