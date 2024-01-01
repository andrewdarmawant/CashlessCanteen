<html>
<h1>Vendor Information</h1>
</html>
<?php
$servername = "cashlesscanteeniics.com";
$username = "cashless_theeo";
$password = "machinelearning";
$database = "cashless_maindatabase";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    echo "Connection failed";
} 


$column_names = array();
$db_name = "";
$table_number = 1;

//CHOOSES WHICH TABLE TO DISPLAY
if ($table_number == 1){
    //vendor's data
    $db_name = "vendor_data";
    array_push($column_names, "vendor_id", "vendor_name");
}else if($table_number == 2){
    //employee data
    $db_name = "employee_data";
    array_push($column_names, "employee_id", "employee_name", "vendor_id");
}



//SETUP SQL QUERY

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

<style>
table, td{
	border-style: solid;
	border-color: black;
}
</style>