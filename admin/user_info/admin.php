<html id="html">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

<title>Admin Interface</title>
<div id="header"><h1>Admin</h1></div>
<center>

<div id="options">
<form action="admin.php" method="post">
<input type="submit" class="submit" id="submit1" name="submit1" value="Vendor History">

<input type="button" class="submit" id="submit2" name="submit2" value="Vendor Information">

<input type="button" class="submit" id="submit3" name="submit3" value="Student Information">
</form>
</div>
<script>
$(".submit").css("background-color", "gray");
$(".submit").css("height", "50px");
$(".submit").click(function(){
	$(".submit").css("background-color", "gray");
	$(this).css("background-color", "white")
});
console.log("hi");
</script>
<?php
$message = "hello world";
function retDb(){
	//connect
	return array(array('header1', 'header2', 'header3', 'header4'),array('test', '10000', '101001010100100', 'time dilation'), array('test', '10000', '101001010100100', 'time dilation'), 
	array('test', '10000', '101001010100100', 'time dilation'), array('test', '10000', '101001010100100', 'time dilation'));
}
function createTable($rows, $cols, $arr){
	//create table header
	echo "<table>";
	echo "<tr>";
	for($j = 0; $j <= count($arr)-1; $j++){
		echo "<td><b> $arr[$j] </b></td>";
	}
	echo"</tr>";
	
	//Loop rows and colums
	for($i = 1; $i <= $rows-1; $i++){
		echo "<tr>";
		for($j = 0; $j <= $cols-1; $j++){
			echo "<td>", retDb()[$i][$j], "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	
}

if(isset($_REQUEST["submit1"])){
//get data from database  -- still in stub
$r = count(retDb());
$c = count(retDb()[0]);
$a = retDb()[0];

//creating the table
createTable($r, $c, $a);
}

if(isset($_REQUEST["submit2"])){
//get data from database  -- still in stub
$r = count(retDb());
$c = count(retDb()[0]);
$a = retDb()[0];

//creating the table
createTable($r, $c, $a);
}

if(isset($_REQUEST["submit3"])){
//get data from database  -- still in stub
$r = count(retDb());
$c = count(retDb()[0]);
$a = retDb()[0];

//creating the table
createTable($r, $c, $a);
}
?>
</center>
<style>
#html{
	background-color:  lightblue;
}
td{
	padding-left: 100px;
	padding-right: 100px;
}
table, td{
	border-style: solid;
	border-color: black;
}
</style>
</html>