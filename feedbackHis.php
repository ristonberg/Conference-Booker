<?php

 session_start();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
        
<meta charset="utf-8">
            
<title>Conference Room Booker</title>
	
<script type="text/javascript" src="logOut.js"></script>
<script type="text/javascript" src="background.js"></script>
<link rel="stylesheet" href="welcome.css">
<link href='lib/fullcalendar.css' rel='stylesheet' />
<link href='lib/fullcalendar.print.css' rel='stylesheet' media='print' />
<script type="text/javascript" src='lib/moment.min.js'></script>
<script type="text/javascript" src='lib/jquery.min.js'></script>
<script type="text/javascript" src='lib/fullcalendar.min.js'></script>


<style>
	#calendar {
		max-width: 900px;
		/*margin: 0 auto;*/
	}
</style>
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
        // Start the session
       

        // if user has already logged in
        // skip connecting database
        if(!$_SESSION['row']){

        
        
		$conn = mysqli_connect("176.32.230.252","cl57-xuezheng","HnsXB/zKk","cl57-xuezheng");
		// Check connection
		if(!$conn) {
			die('Connection problem ! --> '.mysql_error());
		}

		$email = $_POST['email']; 
		$password = $_POST['password'];
		$tablename = 'users';
		$needrank = 'admin';

		$sql="SELECT * FROM $tablename WHERE email='$email'";
		$result=mysqli_query($conn, $sql);

		$count=mysqli_num_rows($result);
		// If result matched $email, table row must be 1 row
		if($count==1){
			$_SESSION['row'] = mysqli_fetch_assoc($result);
			if ($password == $_SESSION['row']['password']){
				$firstname = $_SESSION['row']['firstname'];
				$lastname = $_SESSION['row']['lastname'];
			}
			else {
				header("Location: index.html");
				exit();
			}
		}
		else{
			header("Location: index.html");
			exit();
		}

		$userID = $_SESSION['row']['id'];
		$tablenameII = 'Appt';
		$sqlII="SELECT * FROM $tablenameII WHERE user = '$userID'";
		$resultII=mysqli_query($conn, $sqlII);
		}
		else {
			$firstname = $_SESSION['row']['firstname'];
			$lastname = $_SESSION['row']['lastname'];
		}

		echo '<p class = "role">Logged in as: ';
		echo $_SESSION['row']['rank'];
        	echo '&nbsp';
        	echo '<input id="button1" type="button" onclick="logOut();" value="LOGOUT"/>';
		echo '</p>';
		echo '<br>';
		echo '<header class = "Disclaimer"><h1>Welcome<br>';
		echo $firstname;
		echo " ";
		echo $lastname;
		echo '</h1></header>';
	?>
	




<aside class = "NavSiderbar">
    <nav>
        <?php
			if($_SESSION['row']['rank'] == "Admin"):
				echo '<h3 class = "subtitle">Admin Tools</h3>';
				echo '<ul>';
					echo '<li><a href= "assignUserForm.php">Add New User</a></li><br>';
				echo '</ul>';
			endif;
			if($_SESSION['row']['rank'] == "Manager"):
				echo '<h3 class = "subtitle">Manager Tools</h3>';
				echo '<ul>';
					echo '<li><a href= "assignUserForm.php">Add New User</a></li><br>';
				echo '</ul>';
			endif;
		?> 
        <h2 class = "subtitle">Contents</h2>
        <ul>
        	<li><a href= "welcome.php">Home</a></li><br>
            <li><a href= "myprofile.php">My Profile</a></li><br>
            <li><a href= "searchroom.php">Book a Room</a></li><br>
			<li><a href= "adminTools.php">Manage Appointments</a></li><br>
            <li><a href= "feedbackHis.php">Feedback History</a></li><br>
            <li><a href= "apptHis.php">Appointment History</a></li><br>
        </ul>
    </nav>
</aside>

<script type="text/javascript" src="feedbackHis.js"></script>

<main class="Content">
    <h2>Feedback History</h2>
    <!--List Feedback-->
    <ul class = "result"> Loading Please Wait<!-- Do not Delete --></ul>
    
    
</main>
</body>
</html>
