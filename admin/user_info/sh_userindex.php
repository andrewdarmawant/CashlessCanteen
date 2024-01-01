<?php

$servername = "cashlesscanteeniics.com";
$username = "cashless_theeo";
$password = "machinelearning";
$database = "cashless_maindatabase";


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    echo "Connection failed";
} 

$column_names = array("no_users","student_id");
$db_name = "user_index_sh";

$sql = "SELECT ";
for($index = 0; $index <= count($column_names) - 1; $index++){
if($index > 0){
    $sql .= ", ";
}
$sql .= $column_names[$index];
}
$sql .= " FROM ". $db_name;


$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    echo "<h1>Senior High User Index</h1>";
    // output data of each row
    echo "<table>";
    echo "<tr>";
    for ($title_index = 0; $title_index <= count($column_names) - 1; $title_index++){
        echo "<td><b>". $column_names[$title_index]. "</b></td>";
    }
    echo "</tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        for($index2 = 0; $index2 <= count($column_names) - 1; $index2++){
        echo "<td>" . $row[$column_names[$index2]]. " </td>";
        }
        echo"</tr>";
    }
    echo "</table>";
} else {
    echo "No results were found...";
}



?>

<html>
    <body>
        <style>
            table, td{
            	border-style: solid;
            	border-color: black;
            }
        </style>
    </body>
</html>
