<html>
    <body>
<?php
require ('connection.php');

$index =  $_POST['index'];
$topupmoney = $_POST['topupmomney'];

if ($index > 0){ 
    
    $sql1 = "SELECT * FROM UsersBalance WHERE id_index = '$index'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {
        if($index == $row['id_index']){
            $sql2 = "UPDATE UsersBalance SET BalanceLeft = (BalanceLeft +'$topupmoney') WHERE id_index = '$index'";
            $result = $conn->query($sql2);
            echo "Top-up successful";
        }
        else{ echo "wrong id number";}
    }
    } else {
    echo "wrong id number";
    }
} else echo "";


mysqli_close($conn);
?>   
<form method="POST"> <center><strong>Top-up amount </strong>
    <input type='number' value ='<?php echo $topupmomney;?>' name="topupmomney" id="topupmomney"><br><br>
    <strong>No. </strong>
    <input type='number' value ='<?php echo $index ?>' name="index" id="index"><br>
    <input type='submit'><br>
    </center></form>
    </body>
</html>