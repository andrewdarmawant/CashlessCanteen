<html>
<?php
require ('connection.php');

if(isset($_Get['submit'])){
$student_id =$_Get['student_id'];
$full_name =$_Get['full_name'];
$dob =$_Get['dob'];
}
$sql = "INSERT INTO student_data_sh (student_id, full_name, dob) VALUES ('$student_id', '$full_name', '$dob')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<form action= "insertdata.php" method= "GET">
	<table>
	<tr> 
			<td colspan="2"><h1>Insert Student Data </h1></td>
	</tr>
	<tr>
			<td>student_id</td>
			<td> <Input type="text" name="student_id"/> </td>
	</tr>
	<tr>
			<td>full_name </td>
			<td> <Input type="text" name="full_name"/> </td>
	</tr>
	
	<tr>
			<td>dob </td>
			<td> <Input type= "text" name= "dob" placeholder="yy/mm/dd"/> </td>
	</tr>
	
	<tr>
			<td colspan="2"><Input type= "submit" name= "submit" value= "record"/></td>
	</tr>
	
	</table>
</form>
</html>