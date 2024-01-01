<?php

//in localhost
// $servername = "localhost";
// $username = "root";
// $password = "root";
$servername = "cashlesscanteeniics.com";
$username = "cashless_izack";
$password = "IsaacWinoto0101";
$dbname = "cashless_maindatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>