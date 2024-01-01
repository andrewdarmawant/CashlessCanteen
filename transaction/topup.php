<html>
<body>


<h2>Top Up</h2>
<form method="get" action="topup.php">  
  id_index: <input type="number" name="Card Number" value="<?php $id_index;?>">
  <br><br>
  TopUp_Amount: <input type="number" name="Top Up Amount" value="<?php $TopUp_Amount;?>">
  <br><br>
 
  <input type="submit" name="submit" value="Submit">  
</form>

<?php

require ('connection.php');

//we have to create an input uid and top up money form
$id_index =  $_GET['id_index'];
$TopUp_Amount = (int)$_GET['TopUp_Amount'];

$sql2 = "UPDATE UsersBalance SET BalanceLeft = (BalanceLeft +'$TopUp_Amount') WHERE id_index = '$id_index'";
// $result = $conn->query($sql2);
if ($conn->query($sql2) === TRUE)  {
echo "Top-up successful";
    
}

mysqli_close($conn);
	
?>
</body>
</html>