<?php

    $conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
    $appID = $_GET['appID'];
    $userID = $_GET['userID'];
    $email = "";
    $room = "";
    $date = ""; 
    $time = ""; 
 
    $sql = "SELECT * FROM Appt WHERE appID = '$appID'";

     if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $resultApp = mysqli_query($conn, $sql);

    $sql = "SELECT email FROM users WHERE id = '$userID'"; 

    $resultUser = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($resultApp)) 
	{
		$room = $row['roomID'];
		$date = $row['date'];
		$time = $row['starttime'];
		$end = $row['endtime'];
	}

	while($row = mysqli_fetch_array($resultUser)) 
	{
		$email = $row['email'];
		echo $email; 
	}

	$to = $email; 
	$subject = "Appointment Deletion on ".$date.""; 
	$message = "Please confirm that you would like to delete your appointment on, ".$date.", starting
	at, ".$time." and ending at ".$end.". This meeting is being held in room ".$room.". Click on the link provided in this email to confirm your changes. 
	http://176.32.230.252/xuezheng.com/updateApps.php?appID=".$appID."";
	$headers = "Appointment Management System";

	mail($to, $subject, $message, $headers);

	header("Location: http://176.32.230.252/xuezheng.com/welcome.php");
?>
