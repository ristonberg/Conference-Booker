<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">

<title>Conference Room Booker</title>

<body style="background-color:#b0c4de">

<link rel="stylesheet" href="welcome.css">

</head>

<body>


<?php
    session_start();
    echo '<p class = "role">Successful logged in as: ';
    echo $_SESSION['row']['rank'];
    echo '</p><br>';
    echo '<header class = "Disclaimer"><h1>Welcome</h1>';
    echo $_SESSION['row']['firstname'];
    echo " ";
    echo $_SESSION['row']['lastname'];
    echo '</header>';
    ?>

<aside class = "NavSiderbar">
<nav>
<h2 class = "subtitle">Contents</h2>
<ul>
<li><a href= "myprofile.php">My Profile</a></li><br>
<li><a href= "bookRoom.php">Book/Cancel a Room</a></li><br>
<li><a href= "index.html">Provide a Feedback</a></li><br>
<li><a href= "index.html">Feedback History</a></li><br>
<li><a href= "index.html">Appointment History</a></li><br>
<li><a href= "index.html">Something Else</a></li><br>

</ul>
		<?php
			if($_SESSION['row']['rank'] == "Admin"):
				echo '<h3 class = "subtitle">ADMIN</h3>';
				echo '<ul>';
					echo '<li><a href= "AssignUserForm.html">Add New User</a></li><br>';
					echo '<li><a href= "index.html">Update User Rank</a></li><br>';
				echo '</ul>';
			else:
				echo '<p>HI</p>';
			endif;
		?>
</nav>
</aside>
<main class="Content">
<h2>Edit My profile</h2>

<form id="assignUserForm" action="inputUser.php" method="POST" onsubmit="true">

<h4>Personal Information</h4>

<?php
echo '<label for="email">Email </label>';
echo '<input id="email" name="email" type="email" value="';
echo $_SESSION['row']['email'];
echo '"readonly><br>';
?>
<label for="birthDate">Birth Date</label>
<input id="birthDate" name="birthDate" type="date" ><br>

<label for="age">Age</label>
<input id="age" name="age" type="number" min="1" max="120" step="1" ><br>
<label for="gender">Gender</label>
<select id="gender" name="gender">
<option value="female">Female</option>
<option value="male">Male</option>
</select><br>

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
