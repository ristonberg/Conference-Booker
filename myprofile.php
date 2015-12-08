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
            
<title>Conference Room Booker</title>
	
<body>
<script type="text/javascript" src="logOut.js"></script>
<link rel="stylesheet" href="welcome.css">
<script type="text/javascript" src="background.js"></script>

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
            <li><a href= "feedbackHis.php">Feedback History</a></li><br>
            <li><a href= "apptHis.php">Appointment History</a></li><br>            
        </ul>
    </nav>
</aside>

<?php
    echo '<main class="Content"> ';
    echo '<h2>My profile</h2>';
    echo '<h4>First Name: ';
    echo "&nbsp&nbsp";
    echo $_SESSION['row']['firstname'];
    echo '</h4>';
    echo '<h4>Last Name: ';
    echo "&nbsp&nbsp";
    echo $_SESSION['row']['lastname'];
    echo '</h4>';
    
    echo '<h4>Email Address: ';
    echo "&nbsp&nbsp";
    echo $_SESSION['row']['email'];
    echo '</h4>';
    
    echo '<h4>Birthday: ';
    echo "&nbsp&nbsp";
    echo $_SESSION['row']['birthdate'];
    echo '</h4>';
    
    echo '<h4>Age: ';
    echo "&nbsp&nbsp";
    echo $_SESSION['row']['age'];
    echo '</h4>';
    
    echo '<h4>Gender: ';
    echo "&nbsp&nbsp";
    echo $_SESSION['row']['gender'];
    echo '</h4>';
    
?>


    <ul><a href= "editprofile.php">Edit My Profile</a></ul>
        
    
    
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
