<!DOCTYPE html>
<html lang="en">
<head>
        
<meta charset="utf-8">
            
<title>Conference Room Booker</title>
	
<body>
<script type="text/javascript" src="logOut.js"></script>
<script type="text/javascript" src="background.js"></script>
<link rel="stylesheet" href="welcome.css">
<link href='lib/fullcalendar.css' rel='stylesheet' />
<link href='lib/fullcalendar.print.css' rel='stylesheet' media='print' />
<script type="text/javascript" src='lib/moment.min.js'></script>
<script type="text/javascript" src='lib/jquery.min.js'></script>
<script type="text/javascript" src='lib/fullcalendar.min.js'></script>
<!-- TO DO: re-format date/time to match Calendar.
	 TO DO: also display events in english on top of calendar  -->

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
        session_start();

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
        <h2 class = "subtitle">Contents</h2>
        <ul>
        	<li><a href= "welcome.php">Overall</a></li><br>
            <li><a href= "myprofile.php">My Profile</a></li><br>
            <li><a href= "bookRoom.php">Book/Cancel a Room</a></li><br>
            <li><a href= "provideFeedback.php">Provide a Feedback</a></li><br>
            <li><a href= "index.html">Feedback History</a></li><br>
            <li><a href= "index.html">Appointment History</a></li><br>
            <li><a href= "index.html">Something Else</a></li><br>
            
        </ul>
		<?php
			if($_SESSION['row']['rank'] == "Admin"):
				echo '<h3 class = "subtitle">ADMIN</h3>';
				echo '<ul>';
					echo '<li><a href= "assignUserForm.html">Add New User</a></li><br>';
					echo '<li><a href= "index.html">fdh</a></li><br>';
				echo '</ul>';
			else:
				echo '<p>HI</p>';
			endif;
		?>
            </nav>
</aside>

<script type="text/javascript">
	//  create data for appointment array, 
	// 	where each 
	//  appointment = {
	// 		date: $row['date'],
	// 		starttime: $row['starttime'],
	// 		endtime: $row['endtime'],
	// 		room: $row['ConfID']
	// 	}

	var appArray = [];
	var eachApp = {};
	<?php $newRow = mysqli_fetch_assoc($resultII) ?>
	var data = "<?php echo $newRow ?>";
	while (data){
		eachApp = {
			date: "<?$newRow['date']?>",
			starttime: "<?$newRow['starttime']?>",
			endtime: "<?$newRow['endtime']?>",
			room: "<?$newRow['ConfID']?>"
		};
		appArray.push(eachApp);
		var data = "<?php echo $newRow ?>";
		<?php $newRow = mysqli_fetch_assoc($resultII) ?>
	}

	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; 
	var yyyy = today.getFullYear();

	if(dd<10) {
	    dd='0'+dd
	} 

	if(mm<10) {
	    mm='0'+mm
	} 

	today = yyyy + "-" + mm + "-" + dd;

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			
			defaultDate: today,
			//editable: true,
			eventLimit: true, 
			events: [
				
				{	
					//an example
					title: 'room 101',
					start: '2015-10-29T15:30:00',
					end: '2015-10-29T16:00:00'
				},
				
			]
		});
		
	});
</script>
<main class="Content">
    <h2>Account Overall</h2>
    <!--Check if he has Appoinment-->
    <!-- <p> You don't have any appointment now</p> -->
    <h3>Upcoming Event</h3>
    <div id='calendar'></div>  
    
    
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
