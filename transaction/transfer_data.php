<?php
$servername = "cashlesscanteeniics.com";
$username = "cashless_AD";
$password = "//QmZp7319";
$dbname = "cashless_maindatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO transaction_history( student_id, transaction_id, vendor_id, employee_id, date_and_time, spent_amount, status)
SELECT student_id, transaction_id, vendor_id, employee_id, date_and_time, spent_amount, status
FROM daily_transaction";
$result = $conn->query($sql);

$sql1 = "SELECT * FROM transaction_history";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
	echo "<table><tr><td>student_id</td><td>transaction_id</td><td>vendor_id</td><td>employee_id</td><td>datetime</td><td>spent_amount</td><td>status</td><td>balance_left</td></tr>";
    while($row = $result1->fetch_assoc()) {
        echo  "<tr><td>".$row['student_id']."</td><td>". $row['transaction_id']. "</td><td>". $row['vendor_id']. "</td><td>". $row['employee_id'];
		echo "</td><td>". $row['date_and_time']. "</td><td>" .$row["spent_amount"]."</td><td>" .$row["status"]."</td></tr>"; 
    }
} else {
    echo "0 results";
}


$conn->close();
?>
