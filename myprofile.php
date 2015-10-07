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


    <a href= "editprofile.php">Edit My Profile</a>
        
    
    
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
