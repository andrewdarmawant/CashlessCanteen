<?php
$servername = "cashlesscanteeniics.com";
$username = "cashless_AD";
$password = "//QmZp7319";
$dbname = "cashless_Login";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT user_name, password FROM Login_credentials";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  "Uname: ". $row["user_name"]. "<br>Password: " . $row["password"]. "<br><br>";
    }
} else {
    echo "0 results";
}


$conn->close();
?>
