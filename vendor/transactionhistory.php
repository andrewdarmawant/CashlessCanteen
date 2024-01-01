<html>
<?php
require ('connection.php');
$sql = "SELECT * FROM daily_transaction WHERE vendor_id = 'C'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo  "<br>" . "Student_id: " . $row["student_id"]. " - Transaction_id: " . $row["transaction_id"];
	    echo " - Vendor_id: " . $row["vendor_id"]. " - Employee_id: " . $row["employee_id"]. " - Spent_amount: " . $row["spent_amount"];
    } 
} else {
    echo "no results";
}

mysqli_close($conn);
?>

</html>