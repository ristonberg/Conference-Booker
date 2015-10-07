<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<script type="text/javascript" src="validateForm.js"></script>
<title>Conference Room Booker</title>

<body style="background-color:#b0c4de">

<style>
    #comments{
        width: 400px;
        height: 152.8px;
    }
    
textarea:required:invalid, input:required:invalid {
    background-color: lightyellow;
    
    
}

</style>

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
<li><a href= "provideFeedback.php">Provide a Feedback</a></li><br>
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


<form id="feedback" action="#" onsubmit="return validateForm()">

<h3>Create a New Feedback </h3>
<label for="id">Room ID: </label>
 <input id="id" name="id" type="number" min="1" max="10000000" step="1" placeholder="e.g. 123456" required><br><br>
     
<label for="overall">Rate your overall experience: </label>
<select id="overall" name="overall" required>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
<br><br>

<label for="comments">Please write some comments: </label><br>
<textarea id="comments" oninput="validateComments(this)" required placeholder = "Please enter at least 50 chars"></textarea>


</select><br>

<p><input type="submit" value="Submit your feedback"></p>




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
