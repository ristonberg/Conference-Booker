<?php
	date_default_timezone_set('America/Chicago');

	$appID = $_POST['appID'];
	$roomID = $_POST['roomID'];
	$user = $_POST['user'];
	$date = $_POST['date'];
	$starttime = $_POST['starttime'];
	$duration = $_POST['duration'];
	$endtime=$starttime;
		for($x=0; $x<$duration; $x++){
			$endtime=date('H:i', strtotime($endtime)+1800);
		}
	$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
	
	// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT * FROM Appt WHERE date = '$date' AND starttime = '$starttime'";  
	$result=mysqli_query($conn, $sql);

	if (!$result) {
    	echo mysqli_error($conn);
    	exit();
	}
	if(mysqli_num_rows($result) > 0)
	{
		echo "That record already exists! Redirecting... ";
		sleep (3); 
		header("Location: http://176.32.230.252/xuezheng.com/adminTools.php");
	}
	else 
	{
		$sql = "UPDATE Appt SET date = '$date', starttime = '$starttime', endtime = '$endtime'
		WHERE appID = '$appID'";
		$result=mysqli_query($conn, $sql);
		header("Location: http://176.32.230.252/xuezheng.com/adminTools.php");

	}

?>
