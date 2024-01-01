<?php
require ('connection.php');
$sql = "SELECT student_id, grade_id FROM student_grade";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Student_id: " . $row["student_id"]. " - Grade_id: " . $row["grade_id"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>