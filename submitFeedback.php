<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Submit Feedback Form</title>
  
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
		$roomid = $_POST["roomid"];
		$userid = $_POST["userid"];
		$rating = $_POST["overall"];
		$comments = $_POST["comments"];
		// Create connection
		$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "INSERT INTO Feedback (roomid, userid, rating, comments)
			Values  = ('$roomid', '$userid', '$rating', '$comments')";
		if (mysqli_query($conn, $sql)) {
			echo "Feedback successfully submitted<br>";
			echo '<button onclick="goBack()">Go Back</button>';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	?>
	
	
	
</body>
</html>