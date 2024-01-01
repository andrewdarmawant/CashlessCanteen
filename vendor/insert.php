<html>
<head>
<title>PHP Database - insert data</title>
</head>
<body>

<?php
	if(isset($_GET['submit'])){
		$student_id = $_GET['student_id'];
		$full_name = $_GET['full_name'];
		$dob = $_GET['dob'];
		
		require('connection.php');
		$sql = "INSERT INTO student_data_jh(student_id, full_name, dob) VALUES ('$student_id','$full_name','$dob')";
	if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	}
mysqli_close($conn);
?>
	
	<form action="insert.php" method="GET">
		<table>
			<tr>
				<td colspan="2"><h1>Insert New Student record</h1></td>
			</tr>
			<tr>
				<td>student_id</td>
				<td><Input type="text" name="student_id"/></td>
			</tr>
			<tr>
				<td>full_name</td>
				<td><Input type="text" name="full_name"/></td>
			</tr>
			<tr>
				<td>dob</td>
				<td> <Input type="text" name="dob"/></td>
				
			
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="record"</td>
			</tr>
		</table>
	</form>

</body>
</html>