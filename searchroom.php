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
hitme();
document.fgColor = textColor();
var myMessage= Greetings();
document.write(myMessage);
</script>
</h2>

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


<aside class = "NavSiderbar">
<nav>
    	<?php
			if($_SESSION['row']['rank'] == "Admin"):
				echo '<h3 class = "subtitle">Admin Tools</h3>';
				echo '<ul>';
					echo '<li><a href= "assignUserForm.php">Add New User</a></li><br>';
					echo '<li><a href= "adminTools.php">Manage Appointments</a></li><br>';
				echo '</ul>';
			else:
				echo '<p>HI</p>';
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
<li><a href= "searchroom.php">Book/Cancel a Room</a></li><br>
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



<form id="assignUserForm" action="searchroom.php" method="POST" onsubmit="true">

<h3>Create New Appointment</h3>
<h4>Search avaiable Room</h4>

<label for="Building">Building</label>
<?php
	echo '<select id="Building" name="Building">';
	$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
	$sql = "SELECT BuildCode, BuildName FROM Building";
	$query=mysqli_query($conn, $sql);
	while ($row=mysqli_fetch_array($query)){
		$BuildCode = $row['BuildCode'];
		$BuildName = $row['BuildName'];
		echo "<option value='";
		echo $BuildCode;
		echo "'>";
		echo $BuildName;
		echo "</option>";
	}
	echo "</select>";
?>
<br><br>
<label for="date">Date</label>
<input type="date" name="date">
<br><br>
<label for="startTime">Start Time</label>
<input type="time" name="startTime">
<br><br>
<label for="duration">Duration of Meeting(minutes)</label>
<select id="duration" name="duration">
<option value="1">30</option>
<option value="2">60</option>
<option value="3">90</option>
<option value="4">120</option>
</select>
<br><br>
<label for="Internet">Internet</label>
<select id="Internet" name="Internet">
<option value="1">Yes</option>
<option value="0">No</option>
</select>
<br><br>
<label for="Mic">Mic</label>
<select id="Mic" name="Mic">
<option value="1">Yes</option>
<option value="0">No</option>
</select>
<br><br>
<label for="Writingboard">Chalkboard/whiteboard</label>
<select id="Writingboard" name="Writingboard">
<option value="1">Yes</option>
<option value="0">No</option>
</select>
<br><br>
<label for="Screen">Screen</label>
<select id="Screen" name="Screen">
<option value="1">Yes</option>
<option value="0">No</option>
</select>
<br><br>
<label for="Computer">Computer</label>
<select id="Computer" name="Computer">
<option value="1">Yes</option>
<option value="0">No</option>
</select>
<br><br>
<label for="Size">Size</label>
<select id="Size" name="Size">
<option value="10">10</option>
<option value="20">20</option>
<option value="40">40</option>
<option value="80">80</option>

</select><br>

<p><input type="submit" value="Search"></p>
</form>


<?php
	if($_POST){
		date_default_timezone_set('America/Chicago');
		$Building = $_POST["Building"];
		$date = $_POST["date"];
		$starttime = $_POST["startTime"];
		$duration = $_POST["duration"];
		$internet = $_POST["Internet"];
		$mic = $_POST["Mic"];
		$writingboard = $_POST["Writingboard"];
		$screen = $_POST["Screen"];
		$computer = $_POST["Computer"];
		$size= $_POST["Size"];
		
		$endtime=$starttime;
		for($x=0; $x<$duration; $x++){
			$endtime=date('H:i', strtotime($endtime)+1800);
		}
		// Create connection
		$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT roomID FROM Conf_rooms C WHERE internet >= '$internet' AND mic >= '$mic' AND 
			writingboard >= '$writingboard' AND screen >= '$screen' AND computer >= '$computer' AND
			size >= '$size' AND Building = '$Building'
			AND C.roomID NOT IN (
				SELECT roomID FROM Appt WHERE date='$date' AND (starttime >= '$starttime' AND 
				endtime <= '$endtime'))";
		$result=mysqli_query($conn, $sql);
		if($result) {
			echo "<form action='bookRoom.php' method='post'>";
			while($row=mysqli_fetch_array($result)){
				echo " <input type='radio' value='";
				echo $row['roomID'];
				echo "' name='room'/>";
				echo $Building;
				echo " ";
				echo $row['roomID'];
				echo " <input type='hidden' name='start' value='";
				echo $starttime;
				echo "'/>";
				echo " <input type='hidden' name='endtime' value='";
				echo $endtime;
				echo "'/> ";
				echo " <input type='hidden' name='date' value='";
				echo $date;
				echo "'/> ";
				echo "<br>";
				}
			echo "<input type='submit' value='book'>";
			echo "</form>";
					
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
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
