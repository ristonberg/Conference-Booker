<?php
    session_start();
    echo '<p class = "role">Successful logged in as: ';
    echo $_SESSION['row']['rank'];
    echo '&nbsp';
    echo '<input id="button1" type="button" onclick="logOut();" value="LOGOUT"/>';
    echo '</p><br>';
    echo '<header class = "Disclaimer"><h1>Welcome</h1>';
    echo $_SESSION['row']['firstname'];
    echo " ";
    echo $_SESSION['row']['lastname'];
    echo '</header>';
    ?>
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
	date_default_timezone_set('America/Chicago');
    $conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
    $user = $_SESSION['row']['id'];
    $userID = $_GET['userID'];
    $today = date('Y/m/d');
    $email = $_GET['email'];

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    if($_SESSION['row']['rank'] == "Admin")
    {
        $sql = "SELECT * FROM Appt a INNER JOIN users u ON a.user = u.id WHERE u.owner = '$user' AND a.date >= DATEADD(day, -30, getdate()
        AND a.date <= getdate()"; 
        $sql2 = "SELECT * FROM Appt a WHERE user = '$userID' AND a.date >= '$today'";
    }
    else if ($_SESSION['row']['rank'] == "Manager") 
    {
        $sql = "SELECT * FROM Appt a INNER JOIN users u ON a.user = u.id WHERE u.owner = '$user' AND a.date >= '$today'";
    }

    $result = mysqli_query($conn, $sql);
    $result2 = "";
    if($_SESSION['row']['rank'] == "Admin")
    {
        $result2 = mysqli_query($conn, $sql2);
    }

    if($result2)
    {
    	$to=$email;
    	$subject= "Appointments report";
    	$headers="MIME-Version: 1.0\r\n";
    	$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
    	
        $message ="<html><body>";
        $message .= "Manager's Appointments";
        $message .= "<table BORDER = '2'>";
        $message .= "<th width='130'>Appointment #</th>";
        $message .= "<th width='130'>Room</th>";
        $message .= "<th width='130'>User</th>";
        $message .= "<th width='130'>Date</th>";
        $message .= "<th width='130'>Start Time</th>";
        $message .= "<th width='130'>End Time</th>";
        while($row = mysqli_fetch_array($result2))
        {
            $appID = $row['appID'];
            $roomID= $row['roomID'];
            $user = $row['user'];
            $date = $row['date'];
            $starttime = $row['starttime'];
            $endtime = $row['endtime']; 
		 	$message .="<tr><td id='appID'>".$appID."</td><td>".$roomID."</td><td>".$user.
            "</td><td input type='date'>".$date."</td><td>".$starttime.
            "</td><td>".$endtime."</td></tr>";
		}
		$message .= "</table>";

		if($result)
    	{
 			$message .= "Manager's User's Appointments";
			$message .= "<table BORDER = '2'>";
			$message .= "<th width='130'>Appointment #</th>";
			$message .= "<th width='130'>Room</th>";
			$message .= "<th width='130'>User</th>";
			$message .= "<th width='130'>Date</th>";
			$message .= "<th width='130'>Start Time</th>";
			$message .= "<th width='130'>End Time</th>";
			while($row = mysqli_fetch_array($result))
			{
				$appID = $row['appID'];
				$roomID= $row['roomID'];
				$user = $row['user'];
				$date = $row['date'];
				$starttime = $row['starttime'];
				$endtime = $row['endtime']; 
				$message .= "<tr><td id='appID'>".$appID."</td><td>".$roomID."</td><td>".$user.
				"</td><td input type='date'>".$date."</td><td>".$starttime.
				"</td><td>".$endtime."</td></tr>";   
			}
			$message .= "</table>";
		}
		$message .= "</body></html>";
		mail($to, $subject, $message, $headers);
    }
	if($result)
	{
		$to=$email;
    	$subject= "Appointments report";
    	$headers= "From: DoNotReply@confBooker.com";
    	$headers.="MIME-Version: 1.0\r\n";
    	$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
    	
        $message ="<html><body>";
		$message .= "User's Appointments";
		$message .= "<table BORDER = '2'>";
		$message .= "<th width='130'>Appointment #</th>";
		$message .= "<th width='130'>Room</th>";
		$message .= "<th width='130'>User</th>";
		$message .= "<th width='130'>Date</th>";
		$message .= "<th width='130'>Start Time</th>";
		$message .= "<th width='130'>End Time</th>";
		while($row = mysqli_fetch_array($result))
		{
			$appID = $row['appID'];
			$roomID= $row['roomID'];
			$user = $row['user'];
			$date = $row['date'];
			$starttime = $row['starttime'];
			$endtime = $row['endtime']; 
			$message .= "<tr><td id='appID'>".$appID."</td><td>".$roomID."</td><td>".$user.
			"</td><td input type='date'>".$date."</td><td>".$starttime.
			"</td><td>".$endtime."</td></tr>";   
		}
		$message .= "</table>";
		$message .= "</body></html>";
		mail($to, $subject, $message, $headers);
	}
	echo "<script type='text/javascript'> goBack(); </script>";

	?>

</body>
</html>