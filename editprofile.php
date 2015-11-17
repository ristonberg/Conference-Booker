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
<h2>Edit My profile</h2>

<form id="assignUserForm" action="updateUser.php" method="POST" onsubmit="true">

<h4>Personal Information</h4>

<?php
echo '<label for="email">Email </label>';
echo '<input id="email" name="email" type="email" value="';
echo $_SESSION['row']['email'];
echo '"readonly><br>';
echo '<label for="birthDate">Birth Date</label>';
echo '<input id="birthDate" name="birthDate" type="date" value="';
echo $_SESSION['row']['birthdate'];
echo '"><br>';
echo '<label for="age">Age</label>';
echo '<input id="age" name="age" type="number" min="1" max="120" step="1" value="';
echo $_SESSION['row']['age'];
echo '"><br>';
echo '<label for="gender">Gender</label>';
echo '<select id="gender" name="gender">';
    echo '<option value="';
	echo $_SESSION['row']['gender'];
	echo '">';
	echo $_SESSION['row']['gender'];
	echo '</option>';
	echo '<option value="Female">Female</option>';
	echo '<option value="Male">Male</option>';
echo '</select><br>';

?>

<p><input type="submit" value="Save Changes"></p>




<footer class="Disclaimer">
<p >These information do not reflect the views of our site.</p>

<p>
<a href="AboutUs.html">About Us</a>
<a href="Disclaimer.html">Disclaimer</a>
<a href="ContactUs.html">Contact Us</a>
</p>

<p>Copyright © 2015</p>
</footer>

</form>

</main>
</body>
</html>
