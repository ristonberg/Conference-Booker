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
			window.location.href = "welcome.php";
		}
	</script>
	
</head>
<body style="background-color:#b0c4de">
  
	<?php
		$roomid = $_POST["roomid"];
		$userid = $_POST["userid"];
		$building = $_POST["building"];
		$rating = $_POST["overall"];
		$comments = $_POST["comments"];
		if ($_POST["appID"]){
			$appID = $_POST["appID"];
			echo $appID;
			$sql = "INSERT INTO Feedback (rating, appID, comments, Building, roomID, userID)
				Values ('$rating', '$appID', '$comments', '$building', '$roomid', '$userid')";
		}
		// Create connection
		$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		if (!$_POST["appID"]){
			$sql = "INSERT INTO Feedback (rating, comments, Building, roomID, userID)
				Values ('$rating', '$comments', '$building', '$roomid', '$userid')";
		}
		$query = "UPDATE Conf_rooms SET AvgRating = 
				(SELECT avg(rating) as average_rate FROM Feedback
					WHERE roomID = '$roomid' AND Building = '$building')
				WHERE roomID = '$roomid' AND Building = '$building'";
		if (mysqli_query($conn, $sql)) {
			echo "Feedback successfully submitted<br>";
			if (mysqli_query($conn, $query)) {
				echo "AvgRating successfully submitted <br>";
				echo "<script type='text/javascript'>";
					echo "goBack();";
				echo "</script>";
			}else {
				echo "This didn't work!" . mysqli_error($conn);
			}
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	?>

</body>
</html>
