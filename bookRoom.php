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
<li><a href= "index.html">Book/Cancel a Room</a></li><br>
<li><a href= "index.html">Provide a Feedback</a></li><br>
<li><a href= "index.html">Feedback History</a></li><br>
<li><a href= "index.html">Appointment History</a></li><br>
<li><a href= "index.html">Something Else</a></li><br>

</ul>
<h3 class = "subtitle">Something More moremore Else</h2>
<ul>
<li><a href= "">dsusafas</a></li><br>
<li><a href= "index.html">afhjkbs</a></li><br>
</ul>
</nav>
</aside>
<main class="Content">
<h3>Delete an Appointment</h2>


<h4>You don't have any appointment right now.</h4>

<br>



<form id="assignUserForm" action="searchRoom.php" method="POST" onsubmit="true">

<h3>Create New Appointment</h3>
<h4>Search a Room</h4>

<label for="Internet">Internet</label>
<select id="Internet" name="Internet">
<option value="1">Yes</option>
<option value="0">No</option>

<label for="Projector">Projector</label>
<select id="Projector" name="Projector">
<option value="1">Yes</option>
<option value="0">No</option>

<label for="Screen">Screen</label>
<select id="Screen" name="Screen">
<option value="1">Yes</option>
<option value="0">No</option>

<label for="Size">Size</label>
<select id="Size" name="Size">
<option value="10">10</option>
<option value="20">20</option>
<option value="40">40</option>
<option value="80">80</option>



</select><br>

<p><input type="submit" value="Search"></p>




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
