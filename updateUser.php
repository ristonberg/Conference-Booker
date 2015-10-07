<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Assign User Form</title>
  
	<style>
		textarea:required:invalid, input:required:invalid {
			background-color: lightyellow;
		}
	</style>

	<script>
		function goBack() {
			window.history.go(-1);
		}
	</script>
	
</head>
<body style="background-color:#b0c4de">
  
	<?php
		$email = $_POST["email"];
		$birthDate = $_POST["birthDate"];
		$age = $_POST["age"];
		$gender = $_POST["gender"];
		// Create connection
		$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "UPDATE users SET birthdate = '$birthDate' , age = '$age' , gender = '$gender'
		WHERE email = '$email'";
		if (mysqli_query($conn, $sql)) {
			echo "Record updated successfully<br>";
			echo '<button onclick="goBack()">Go Back</button>';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	?>
	
	
	
</body>
</html>
