<?php
$servername = "cashlesscanteeniics.com";
$username = "cashless_izack";
$password = "IsaacWinoto0101";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "JOT";
//mysqli_close($conn);
?>