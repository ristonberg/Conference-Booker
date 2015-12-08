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
    $user_id=$_SESSION['row']['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">

<title>Conference Room Booker</title>

<body>
<script type="text/javascript" src="logOut.js"></script>
<script type="text/javascript" src="background.js"></script>

<link rel="stylesheet" href="welcome.css">

</head>

<body>
<h2>
<script Language="JavaScript">

	function goBack() {
		window.location.href = "welcome.php";
	}

hitme();

document.fgColor = textColor();
var myMessage= Greetings();
document.write(myMessage);
</script>
</h2>


<aside class = "NavSiderbar">
<nav>
    	<?php
			if($_SESSION['row']['rank'] == "Admin"):
				echo '<h3 class = "subtitle">Admin Tools</h3>';
				echo '<ul>';
					echo '<li><a href= "assignUserForm.php">Add New User</a></li><br>';
					echo '<li><a href= "adminTools.php">Manage Appointments</a></li><br>';
				echo '</ul>';
			endif;
			if($_SESSION['row']['rank'] == "Manager"):
				echo '<h3 class = "subtitle">Manager Tools</h3>';
				echo '<ul>';
					echo '<li><a href= "assignUserForm.php">Add New User</a></li><br>';
					echo '<li><a href= "adminTools.php">Manage Appointments</a></li><br>';
				echo '</ul>';
			endif;
		?> 
<h2 class = "subtitle">Contents</h2>
<ul>
<li><a href= "welcome.php">Overall</a></li><br>
<li><a href= "myprofile.php">My Profile</a></li><br>
<li><a href= "searchroom.php">Book a Room</a></li><br>
<li><a href= "provideFeedback.php">Provide a Feedback</a></li><br>
<li><a href= "feedbackHis.php">Feedback History</a></li><br>
<li><a href= "apptHis.php">Appointment History</a></li><br>
</ul>
</nav>
</aside>
<main class="Content">
<h3>Delete an Appointment</h2>


<h4>You don't have any appointment right now.</h4>

<br>

<?php
	if ($_POST) {
		date_default_timezone_set('America/Chicago');
		$starttime=$_POST["start"];
		$endtime=$_POST["endtime"];
		$date=$_POST["date"];
		$recurring=$_POST["recurring"];
		$recFreq= $_POST["recFreq"];
		$endDay= $_POST["endDay"];
		$endWeek= $_POST["endWeek"];
		$endMonth= $_POST["endMonth"];
		$roomID=$_POST['room'];
		$building=$_POST['building'];
		
		$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
	
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		if($recurring!=1){
			$recurring=0;
			$roomID=$_POST['room'];
			$sql = "INSERT INTO Appt (roomID, building, user, date, starttime, endtime, recurring)
			VALUES ('$roomID', '$building', '$user_id', '$date', '$starttime', '$endtime', '$recurring')";
			
			if (mysqli_query($conn, $sql)) {
			echo "New record created successfully<br>";
			echo "<script type='text/javascript'> goBack(); </script>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		} 
		else if ($recurring==1 && $recFreq=="d"){
			$sql = "INSERT INTO Rec_Appt (rec_start_time, rec_start_day, rec_day, user_id, room_id)
			VALUES ('$starttime', '$date', '$endDay', '$user_id', '$roomID')";
			
			if (mysqli_query($conn, $sql)) {
			echo "New record created successfully<br>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			
			$sql = "SELECT rec_ID FROM Rec_Appt WHERE rec_start_time='$starttime' AND rec_start_day='$date'
			AND rec_day='$endDay' AND user_id='$user_id' AND room_id='$roomID";
			$result=mysqli_query($conn, $sql);
			$rec_ID=$result;
			$date1= date_create($date);
			while ($date <= $endDay) {
					$sql = "INSERT INTO Appt (roomID, building, user, date, starttime, endtime, recurring)
					VALUES ('$roomID', '$building', '$user_id', '$date', '$starttime', '$endtime', '$recurring')";
			
					if (mysqli_query($conn, $sql)) {
					echo "New record created successfully<br>";
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
				//date_add($date,date_interval_create_from_date_string("1 day"));
				$date=date("Y-m-d",strtotime("+1 day", strtotime($date)));
			}
		}
		
	}
?>



<footer class="Disclaimer">
<p >These information do not reflect the views of our site.</p>

<p>
<a href="AboutUs.html">About Us</a>
<a href="Disclaimer.html">Disclaimer</a>
<a href="ContactUs.html">Contact Us</a>
</p>

<p>Copyright © 2015</p>
</footer>


</main>
</body>
</html>
